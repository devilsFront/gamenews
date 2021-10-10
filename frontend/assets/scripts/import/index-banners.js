const indexBanners = document.querySelector('[data-element="index-banners"]')

export function indexBannersExport() {
  if (indexBanners) setTimeout(indexBannersInit, 0)
}

function indexBannersInit() {
  const areaArray = indexBanners.querySelectorAll('[data-element="index-banners__area"]')
  const navButtonsArray = indexBanners.querySelectorAll('[data-element="index-banners__nav-button"]')
  const buttonPrev = indexBanners.querySelector('[data-element="index-banners__button_prev"]')
  const buttonNext = indexBanners.querySelector('[data-element="index-banners__button_next"]')

  for (let i = 0; i < navButtonsArray.length; i++) {
    navButtonsArray[i].addEventListener("click", checkoutSlide)
  }

  let activeSlideGlobal = 0

  buttonPrev.addEventListener("click", prevSlideCheck)
  buttonNext.addEventListener("click", nextSlideCheck)

  function prevSlideCheck() {
    activeSlideGlobal -= 1
    if (activeSlideGlobal < 0) activeSlideGlobal = areaArray.length - 1
    toggleSlide(activeSlideGlobal)
    toggleNavItem(activeSlideGlobal)
  }

  function toggleNavItem(activeSlideGlobal) {
    const oldActiveNavItem = indexBanners.getElementsByClassName("index-banners__nav-item_active")[0]
    oldActiveNavItem.classList.remove("index-banners__nav-item_active")
    navButtonsArray[activeSlideGlobal].classList.add("index-banners__nav-item_active")
  }

  function nextSlideCheck() {
    activeSlideGlobal += 1
    if (activeSlideGlobal === areaArray.length) activeSlideGlobal = 0
    toggleSlide(activeSlideGlobal)
    toggleNavItem(activeSlideGlobal)
  }

  function checkoutSlide() {
    const oldActiveNavItem = indexBanners.getElementsByClassName("index-banners__nav-item_active")[0]
    oldActiveNavItem.classList.remove("index-banners__nav-item_active")
    this.classList.add("index-banners__nav-item_active")
    const indexSlide = this.getAttribute("data-index")
    activeSlideGlobal = Number(indexSlide)
    toggleSlide(indexSlide)
  }

  function toggleSlide(indexSlide) {
    const oldActiveSlide = indexBanners.getElementsByClassName("index-banners__area_active")[0]
    oldActiveSlide.classList.remove("index-banners__area_active")
    areaArray[indexSlide].classList.add("index-banners__area_active")
  }
}
