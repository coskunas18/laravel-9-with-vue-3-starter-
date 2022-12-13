import { ref } from "vue"
export default function(){

    const links = ref([
        {
            id:'kullanici-yonetim',
            label:'Kullanıcı Yönetimi',
            type:'dropdown',
            icon:'fa-solid fa-clipboard-user',
            items:[
                {
                    id:'kullanici-yonetim-kullanicilar',
                    label:'Kullanıcılar',
                    type:'route',
                    link:'users.index',
                    icon:'fa-solid fa-users'
                },
                {
                    id:'kullanici-yonetim-role-sahip',
                    label:'Role Sahip Kullanıcılar',
                    type:'route',
                    link:'role-users.index',
                    icon:'fa-solid fa-user'
                },
            ]
        },
        {
            id:'urunler',
            label:'Ürün Sistemi',
            type:'dropdown',
            icon:'fa-solid fa-clipboard-list'
        },
        {
            id:'ajanda',
            label:'Ajanda',
            type:'route',
            icon:'fa-solid fa-calendar-days'
        },

    ])

    return{
        links
    }

}
