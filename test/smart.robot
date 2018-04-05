*** Settings ***
Library  Selenium2Library

*** Testcases ***
# ค้นหาคำว่า adidas กับ 23-shopping
#   เปิด Browser ไปที่ 23-Shopping
#   ค้นหาคำว่า  adidas
#   ต้องเจอ adidas 3 คู่

# ค้นหาคำว่า BNK48 กับ 23-shopping
#   เปิด Browser ไปที่ 23-Shopping
#   ค้นหาคำว่า  BNK48

# ค้นหาคำว่า adidas กับ 23-shopping กด item แรก ต้องพบรายละเอียดสินค้า adidas
#   เปิด Browser ไปที่ 23-Shopping
#   ค้นหาคำว่า  adidas
#   กดสินค้าที่ต้องการ  content_0
#   ต้องเจอรายละเอียดสินค้าที่ต้องการ adidas

ทดสอบ
  เปิด Browser ไปที่ 23-Shopping
  test

*** Keywords ***
เปิด Browser ไปที่ 23-Shopping
  Open Browser         http://airmosphere.net/  browser=chrome

ค้นหาคำว่า
  [Arguments]  ${keyword}
  Input Text  id=Keyword  ${keyword}
  Press Key  id=btn_submit

กดสินค้าที่ต้องการ
  [Arguments]  ${product_id}
  Click Element  class=${product_id}

ต้องเจอ adidas 3 คู่
  ${count} =  Get Element Count  class=cover
  Should Be True  ${count} == 3

test
  Click Element  xpath=//*[@id="grid"]/div[1]/a[1]
  
ต้องไม่เจอสินค้า
  Element Should Contain
  ...  xpath=//*[@id="rso"]/div[1]/div/div[1]/div/div/h3/a
  ...  Not found

ต้องเจอรายละเอียดสินค้าที่ต้องการ
 [Arguments]  ${name}
 Element Should Contain
  ...  xpath=//*[@id="rso"]/div[1]/div/div[1]/div/div/h3/a
  ...  ${name}
  