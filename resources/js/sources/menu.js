import { ref } from "vue"
export default function(){

    const links = ref([
        {
            id:'kullanicilar',
            label:'Kullanıcı Yönetimi',
            type:'dropdown',
            icon:'fa-solid fa-clipboard-user',
            items:[
                {
                    id:'kullanicilar-yonetim-kullanicilar',
                    label:'Kullanıcılar',
                    type:'route',
                    link:'users.index',
                    icon:'fa-solid fa-users'
                },
                {
                    id:'kullanicilar-yonetim-role-sahip',
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
            type:'link',
            link:'https://www.google.com.tr/?hl=tr',
            icon:'fa-solid fa-calendar-days'
        },

    ])

    return{
        links
    }

}
