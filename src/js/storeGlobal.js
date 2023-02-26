import Alpine from "alpinejs";

export default (() => {

    Alpine.store('storeGlobal', {

        isLoading: false,
        isMobile: null,
        headerHeight: null,

        init() {

            ['DOMContentLoaded', 'resize', 'scroll'].forEach(event => {
                window.addEventListener(`${event}`, () => {
                    this.isMobile = isMobile();
                    headerHeight();
                });


            });

            function headerHeight(){
                if(document.querySelector("header")){
                    this.headerHeight = document.querySelector("header").clientHeight;
                    document.querySelector(':root').style.setProperty('--setHeaderHeight', this.headerHeight + "px");
                    document.querySelector(':root').style.setProperty('--setHeaderHeightNegative', -this.headerHeight + "px");
                }
            }

            function isMobile() {
                const ua = navigator.userAgent;
                if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua) || (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua) || window.innerWidth < 1024)) {
                    return true;
                } else {
                    return false;
                }
            }

        }

    });

});
