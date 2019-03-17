from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time


capabilities = {
    "browserName": "chrome",
    "version": "72.0",
    "enableVNC": True,
    "enableVideo": False
}

driver = webdriver.Remote(
    command_executor="http://localhost:4444/wd/hub",
    desired_capabilities=capabilities)
driver.maximize_window()

driver.get("http://shop.ekodar.ru")
elem = driver.find_element_by_css_selector(".btn.btn-green").click()
time.sleep(2)
#Для браузера не в полный экран
#elem = driver.find_element_by_xpath("//span/i").click()
elem = driver.find_element_by_xpath("//input").send_keys("test")
elem = driver.find_element_by_xpath("//input").send_keys(Keys.RETURN)
time.sleep(5)
driver.close()
