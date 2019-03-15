from selenium import webdriver
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
driver.get("http://shop.ekodar.ru")

elem = driver.find_element_by_css_selector(".btn.btn-green").check()
time.sleep(1)


# driver.close()



