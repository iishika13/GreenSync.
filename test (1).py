from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys

service = Service("C:/Users/Kibria/Downloads/chromedriver-win64 (1)/chromedriver-win64/chromedriver.exe")
driver = webdriver.Chrome(service=service)

driver.get("http://localhost/eFarm/adminlog.php")
user = driver.find_element(By.ID,"username")
password = driver.find_element(By.ID,"password")
submit = driver.find_element(By.XPATH,"/html/body/div[2]/form/button")

user.send_keys("kib")
password.send_keys("1234")
submit.click()

input()