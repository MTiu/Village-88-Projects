function $query(selector){
    return {
        click:function(func){
            let element = document.querySelectorAll(selector);
            for(let i =0; i<element.length;i++){
                element[i].addEventListener('click', func);
            }
        },

        hide:function(){
            let element = document.querySelectorAll(selector);
            for(let i=0; i<element.length; i++){
                element[i].style.display = 'none';
            }
        },

        show:function(){
            let element = document.querySelectorAll(selector);
            for(let i=0; i<element.length; i++){
                element[i].style.display = '';
            }
        }
    }
}
