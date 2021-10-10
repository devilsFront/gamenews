const categoryTileArray = document.querySelectorAll('[data-element="category-tile"]')

export function exportCategoryTile() {
  if (categoryTileArray) setTimeout(categoryTileInit, 0)
}

function categoryTileInit () {
  for (let i = 0; i < categoryTileArray.length; i++) {
    const categoryTileTileArray = categoryTileArray[i].querySelectorAll('[data-element="category-tile__tile"]')
    const categoryTileHeaderItemBtnArray = categoryTileArray[i].querySelectorAll('[data-element="category-tile__header-item-btn"]')
    for (let i = 0; i < categoryTileHeaderItemBtnArray.length; i++) {
      categoryTileHeaderItemBtnArray[i].addEventListener('click', checkoutBtn)
    }

    function checkoutBtn () {
      const color = this.getAttribute("data-color")
      const oldActiveBtn = categoryTileArray[i].getElementsByClassName(`button_category-${color}-active`)[0]
      oldActiveBtn.classList.remove(`button_category-${color}-active`)
      this.classList.add(`button_category-${color}-active`)
      const index = this.getAttribute("data-index")
      const oldActiveTile = categoryTileArray[i].getElementsByClassName("category-tile__tile_active")[0]
      oldActiveTile.classList.remove("category-tile__tile_active")
      const activeTile = categoryTileTileArray[index]
      activeTile.classList.add("category-tile__tile_active")
    }
  }
}

