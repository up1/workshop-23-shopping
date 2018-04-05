*** Settings ***
Library  Selenium2Library

*** Testcases ***
ค้นหาคำว่า adidas กับ 23-shopping
  เปิด Browser ไปที่ google.com
  ค้นหาคำว่า  adidas
  ต้องเจอ adidas 3 คู่

ค้นหาคำว่า BNK48 กับ 23-shopping
  เปิด Browser ไปที่ google.com
  ค้นหาคำว่า  BNK48
  ต้องไม่เจอสินค้า

ค้าหาคำว่า adidas กับ 23-shopping กด item แรก ต้องพบรายละเอียดสินค้า adidas
  เปิด Browser ไปที่ google.com
  ค้นหาคำว่า  BNK48
  ต้องไม่เจอสินค้า

*** Keywords ***
เปิด Browser ไปที่ google.com
  Open Browser   https://www.google.com/  browser=chrome

ค้นหาคำว่า
  [Arguments]  ${keyword}
  Input Text  id=Keyword  ${keyword}
  Press Key  id=btn_submit

กดสินค้าที่ต้องการ
  [Arguments]  ${product_id}
  Press Key  id=btn_submit

ต้องเจอ adidas 3 คู่
  Element Should Contain
  ...  xpath=//*[@id="rso"]/div[1]/div/div[1]/div/div/h3/a
  ...  adidas A

ต้องไม่เจอสินค้า
  Element Should Contain
  ...  xpath=//*[@id="rso"]/div[1]/div/div[1]/div/div/h3/a
  ...  Not found

ค้าหาคำว่า adidas กับ 23-shopping กด item แรก ต้องพบสินค้า adidas
 Element Should Contain
  ...  xpath=//*[@id="rso"]/div[1]/div/div[1]/div/div/h3/a
  ...  
