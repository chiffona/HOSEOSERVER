//MFRC522 모듈
#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN 10
#define RST_PIN 9
#define led1 7
#define led2 8
#define speaker 6
#define button 5

//EXP8266 모듈
#include <SoftwareSerial.h> 
SoftwareSerial mySerial(2,3); 
//RX,TX 
MFRC522 rfid(SS_PIN, RST_PIN); // Instance of the class
MFRC522::MIFARE_Key key; 

//부속품
int state = 0;  //버튼 상태
int count=0;  //카운트를 계산하여 100번의 루프가 지나면 중복 카드 변수 초기화
int note= 4186; //도표시
int wifi_connect_sound[] = {3520,3951,4186};

//wifi 이름,pw,ip
String ssid = "420";
String PASSWORD = "05081020";
String host = "192.168.0.16";

//변수 지정
byte nuidPICC[4];
String cardnum;

void setup() {  
  pinMode(led1,OUTPUT);
  pinMode(led2,OUTPUT);
  pinMode(speaker,OUTPUT);
  pinMode(button,INPUT);
  Serial.begin(9600); 
  mySerial.begin(9600); 
  SPI.begin(); // SPI 시작
  rfid.PCD_Init(); // RFID 시작
  connectWifi(); 
  delay(500);
          
  //초기 키 ID 초기화
  for (byte i = 0; i < 6; i++) {
  key.keyByte[i] = 0xFF;
  }
}


//RFID 입력            
void loop() {
  //버튼 상태
  if(digitalRead(button) == true) {
    state++;
    tone(speaker,note);
    delay(200);
    noTone(speaker);
    delay(100);
  }

  // 퇴근 || 출근 정보 입력
  if((state == 1)||(state == 2)){
    if(state == 1){
      digitalWrite(led1,HIGH);
      digitalWrite(led2,LOW);
      delay(10);
      Serial.println("퇴근합니다.");
    }
    else if(state == 2){
      digitalWrite(led1,LOW);
      digitalWrite(led2,HIGH);
      delay(10);
      Serial.println("출근합니다.");
    } else{
        state = 1;
        delay(10);
    }
  
    while(true){
      Serial.println("카드를 터치해주세요.");
      delay(5000);
      count++;
      if(digitalRead(button)==true){
        break;
      }
      else if(count==10){
       Serial.println("초기화합니다.");
       for (byte i = 0; i < 4; i++) {
          String(nuidPICC[i])="0";
        }  
      }
      delay(1000);
      
      // 카드가 인식되었다면 다음으로 넘어가고 아니면 더이상 
      // 실행 안하고 리턴
      if ( ! rfid.PICC_IsNewCardPresent())
      return;
  
      // ID가 읽혀졌다면 다음으로 넘어가고 아니면 더이상 
      // 실행 안하고 리턴
      if ( ! rfid.PICC_ReadCardSerial())
      return;
      Serial.print(F("PICC type: "));
  
      //카드의 타입을 읽어온다.
      MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);
      //모니터에 출력
      Serial.println(rfid.PICC_GetTypeName(piccType));
  
    
      // MIFARE 방식인지 확인하고 아니면 리턴
      if (piccType != MFRC522::PICC_TYPE_MIFARE_MINI &&  
      piccType != MFRC522::PICC_TYPE_MIFARE_1K &&
      piccType != MFRC522::PICC_TYPE_MIFARE_4K) {
        Serial.println(F("Your tag is not of type MIFARE Classic."));
        return;
      }
  
      // 만약 바로 전에 인식한 RF 카드와 다르다면..
      if (rfid.uid.uidByte[0] != nuidPICC[0] || 
      rfid.uid.uidByte[1] != nuidPICC[1] || 
      rfid.uid.uidByte[2] != nuidPICC[2] || 
      rfid.uid.uidByte[3] != nuidPICC[3] ) {
        Serial.println(F("A new card has been detected."));
  
        // ID를 저장해둔다.    
        for (byte i = 0; i < 4; i++) {
          nuidPICC[i] = rfid.uid.uidByte[i];
        }
    
        
        Serial.println("10진법 카드번호는?"); 
        for (byte i = 0; i < 4; i++) {
          cardnum += String(nuidPICC[i]);
        }  
        Serial.println(cardnum);
        delay(1000); 
                
        httpclient(cardnum, state); //url로 이어짐
        delay(1000); //Serial.find("+IPD");
                
          while (mySerial.available()) { 
            char response = mySerial.read();
            Serial.write(response); 
            if(response=='\r')
              Serial.print('\n');
          } 
            Serial.println("성공적으로 입력되었습니다.");
            count=0;
            Serial.println("\n==================================\n");
            delay(2000); 
        } else{  //바로 전에 인식한 것과 동일하다면
          Serial.println(F("Card read previously."));
        }
        // PICC 종료
        rfid.PICC_HaltA();
        // 암호화 종료(?)
        rfid.PCD_StopCrypto1();  
        //카드정보 초기화
        cardnum="";
      }
   }
}
 

//와이파이 접속
      void connectWifi(){
      //접속 실패시 반복
       while(true) {
       String join ="AT+CWJAP=\""+ssid+"\",\""+PASSWORD+"\""; 
       Serial.println("Connect Wifi..."); 
       mySerial.println(join); 
       delay(10000); 
       
       if(mySerial.find("OK")) {
        Serial.print("WIFI connect\n");
        
        for(int i=0;i<3;i++) {
        tone(speaker,wifi_connect_sound[i]);
        delay(200);
        noTone(speaker);
        delay(100);
        }
 
       break;
        } else {
       Serial.println("connect timeout\n"); 
       } 
       delay(1000);
       }
         
     }

// 네트워크 송신 함수
         void httpclient(String char_input, int state){ 
        delay(100); 
        Serial.println("connect TCP...");
        mySerial.println("AT+CIPSTART=\"TCP\",\""+host+"\",80");
        delay(500); 
        if(Serial.find("ERROR")) 
        return; 
        Serial.println("Send data...");
        delay(1000);
        String cardnum=char_input;
        String cmd="GET http://10.50.103.58/wifi_temp_SQL/Conn.php?cardnum="+ cardnum +"&state="+ String(state) +" HTTP/1.0\r\n\r\n"; //2줄의 줄넘김 포함
        Serial.print("AT+CIPSEND="); 
        Serial.println(cmd.length()+10);  //cmd.length()
        mySerial.print("AT+CIPSEND="); 
        mySerial.println(cmd.length()+10); //cmd.length()
        delay(1000);
        
        if(mySerial.find(">")) { 
          Serial.print(">"); 
          }
          delay(500);
          mySerial.println(cmd); //주소 입력
          delay(100);
          if(Serial.find("ERROR"))
          return; 
          mySerial.println("AT+CIPCLOSE");
          delay(100);
          }
