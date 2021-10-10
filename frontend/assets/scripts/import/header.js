const header = document.querySelector('[data-element="header"]')

export function headerExport() {
  if (header) setTimeout(headerInit, 0)
}

function headerInit() {
  const headerNav = header.querySelector('[data-element="header__nav"]')
  const headerButtonBurger = header.querySelector('[data-element="header__button_burger"]')
  const headerLayer = header.querySelector('[data-element="header__layer"]')

  headerButtonBurger.addEventListener('click', toggleMenu)
  headerLayer.addEventListener('click', closeMenu)

  const headerSearchButton = header.querySelector('[data-element="header__button_search"]')
  const headerSearchForm = header.querySelector('[data-element="header__search-form"]')
  const headerLayerSearch = header.querySelector('[data-element="header__layer-search"]')
  const headerSearchBtnClose = header.querySelector('[data-element="header__search-btn_close"]')
  const headerSearchInput = headerSearchForm.getElementsByClassName("header__search-input")[0]

  headerSearchButton.addEventListener("click", openSearch)
  headerLayerSearch.addEventListener("click", closeSearch)
  headerSearchBtnClose.addEventListener("click", closeSearch)

  function openSearch() {
    headerSearchForm.classList.add("header__search-form_active")
    headerLayerSearch.classList.add("header__layer-search_active")
    headerSearchInput.focus()
  }

  function closeSearch() {
    headerSearchForm.classList.remove("header__search-form_active")
    headerLayerSearch.classList.remove("header__layer-search_active")
  }

  function closeMenu() {
    headerButtonBurger.classList.remove("header__button_burger-active")
    headerNav.classList.remove("header__nav_active")
    headerLayer.classList.remove("header__layer_active")
  }

  function toggleMenu() {
    if (headerButtonBurger.classList.contains("header__button_burger-active")) {
      closeMenu()
    } else {
      headerButtonBurger.classList.add("header__button_burger-active")
      headerNav.classList.add("header__nav_active")
      headerLayer.classList.add("header__layer_active")
    }
  }
}
