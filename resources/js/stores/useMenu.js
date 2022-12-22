import { defineStore } from 'pinia'

export const useStore = defineStore('menu', {
    state: () => ({
        activeLink:"",
        showMenu:true,
     }),
    actions: {
      toggleMenu(){
        this.showMenu = !this.showMenu;
      },
      setActiveLink(id){
        this.activeLink = id;
      }
    },
  })
