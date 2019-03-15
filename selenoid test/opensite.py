from selenium import webdriver
from selenium.webdriver.common.keys import Keys


capabilities = {
    "browserName": "chrome",
    "version": "72.0",
    "enableVNC": True,
    "enableVideo": False
}

driver = webdriver.Remote(
 command_executor="http://localhost:4444/wd/hub",
  desired_capabilities=capabilities)
driver.get("http://www.python.org")
assert "Python" in driver.title
elem = driver.find_element_by_name("q")
elem.send_keys("python")
elem.send_keys(Keys.RETURN)
assert "No results found." not in driver.page_source
driver.close()