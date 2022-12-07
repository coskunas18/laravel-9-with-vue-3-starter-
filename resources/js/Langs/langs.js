import translateTr from  "./tr.json";
import translateEn from  "./en.json";


export default function() {
    const langs = [
        {
           id:'tr',
        },
        {
            id:'en',
        },
      
    ];

    const translates = {
        en:translateEn,
        tr:translateTr,
    };

    return{
        langs,
        translates
    };


}

