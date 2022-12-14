import { defineStore } from 'pinia'

export const useStore = defineStore('menu', {
    state: () => ({
        activeLink:"kullanicilar",
        showMenu:true,
     }),
    actions: {
      toggleMenu(){
        this.showMenu = !this.showMenu;
      }
    },
  })
