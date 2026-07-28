const body = document.querySelector('body');
const header = document.querySelector('header');
const headerMenu = header?.querySelector('#header__menu') as HTMLElement;
const headerMenuNav = header?.querySelector('#header__menu > nav');
const headerUtils = header?.querySelector('#header__utils') as HTMLElement;
const headerMenuBtn = header?.querySelector('#header__menu-btn') as HTMLElement;
const headerMenuLisWithChildren_a = header?.querySelectorAll('li.menu-item-has-children > a');
const headerMenuSubMenus = headerMenu?.querySelectorAll('.sub-menu');

let winWidth: number;
let headerHeight: number;

function setWinWidth(): number {
    return window.innerWidth;
}

function getTotalWidth(element: HTMLElement): number {
    const computedStyle = window.getComputedStyle(element);

    const totalWidth = 
        element.getBoundingClientRect().width +
        parseInt(computedStyle.marginLeft) +
        parseInt(computedStyle.marginRight) +
        parseInt(computedStyle.paddingLeft) +
        parseInt(computedStyle.paddingRight);
  
    return totalWidth;
}

function getTotalHeight(element: HTMLElement): number {
    const computedStyle = window.getComputedStyle(element);

    const totalHeight = 
        element.getBoundingClientRect().height +
        parseInt(computedStyle.marginTop) +
        parseInt(computedStyle.marginBottom) +
        parseInt(computedStyle.paddingTop) +
        parseInt(computedStyle.paddingBottom);
    return totalHeight;
}

function headerMenuReset(): void {
    if( headerMenuNav?.classList.contains('opened') ){
        headerMenuNav?.classList.remove('opened');
    }
}




/* === adjust LEFT and TOP of QUICK-CALL-PANE === */

const quickCallPanes = document.querySelectorAll<HTMLElement>('.quick-call-pane');

function adjustQuickCallPane(): void {
    quickCallPanes?.forEach( pane => {

        const targetVal = pane.getAttribute('data-quick-target');
        const triggerElem = document.querySelector(`[data-quick-call="${targetVal}"]`);
        const top = triggerElem?.getBoundingClientRect().top as number;
        const height = triggerElem?.getBoundingClientRect().height as number;
        const left = triggerElem?.getBoundingClientRect().left as number;

        pane.style.top = top + height + 'px';
        pane.style.left = left + 'px';

        checkFullWidthQuickCallPane(pane);
    });
}

/* === // adjust LEFT and TOP of QUICK-CALL-PANE === */




/* === set WIDTH 100% of QUICK-CALL-PANE if WINWIDTH is small === */

function checkFullWidthQuickCallPane(pane: HTMLElement): void {
    if( winWidth <= 480 ){
        pane.classList.add('quick-call-pane--full');
    } else {
        pane.classList.remove('quick-call-pane--full');
    }
};

/* === // set WIDTH 100% of QUICK-CALL-PANE if WINWIDTH is small === */




/* === add CLOSE-EVENT to QUICK-CALL-PANE === */

quickCallPanes?.forEach( pane => {
    const closeBtn = pane.querySelector('.quick-call-pane__btn');
    closeBtn?.addEventListener('click', function(): void {
        pane.classList.remove('quick-call-pane--opened');
    });
});

/* === // add CLOSE-EVENT to QUICK-CALL-PANE === */




/* === reset/close QUICK-CALL-PANE === */

function quickCallPaneReset(): void {
    quickCallPanes?.forEach( pane => {
        pane.classList.remove('quick-call-pane--opened');
    });
}

/* === // reset/close QUICK-CALL-PANE === */




/* === evaluate HEIGHT of HEADER === */

function evalHeaderHeight(): void {
    if( header != undefined ){
        headerHeight = getTotalHeight(header);
    }
}

/* === // evaluate HEIGHT of HEADER === */




/* === set PADDING-TOP to .PT-HEADERs (for PADDING-TOP of MAIN) === */

const ptHeaders = document.querySelectorAll<HTMLElement>('.pt-header');

function paddingTopPTHeaders(): void {
    ptHeaders?.forEach( ptHeader => {
        ptHeader.style.paddingTop = headerHeight + 'px';
    });
}

/* === // set PADDING-TOP to .PT-HEADERs (for PADDING-TOP of MAIN) === */




/* === set PADDING-TOP of HEADER-MENU === */

function paddingTopHeaderMenu(): void {
    const headerUtilsHeight = getTotalHeight(headerUtils);
    
    if( body?.classList.contains('home') ){
        if( winWidth >= 768 ){
            headerMenu.style.paddingTop = headerUtilsHeight + 'px';
        } else {
            headerMenu.style.paddingTop = headerHeight + 'px';
        }
    } else {
        headerMenu.style.paddingTop = headerHeight + 'px';
    }
} 

/* === // set PADDING-TOP of HEADER__UTILS === */




/* === add CLASSES by CLICK to HEADER__UTILS === */

headerMenuBtn.addEventListener('click', function(){
    if( headerMenuBtn.classList.contains('opened') ){
        headerUtils.classList.remove('bg-blue');
        headerUtils.classList.remove('color-white');
        headerUtils.classList.add('bg-md-white');
    } else {
        headerUtils.classList.add('bg-blue');
        headerUtils.classList.add('color-white');
        headerUtils.classList.remove('bg-md-white');
    }
});

/* === // add CLASSES by CLICK to HEADER__UTILS === */




/* === toggle OPENERs to CLOSE and OPEN === */

const openerSenders = document.querySelectorAll('[data-opener-sender]');
const openerReceivers = document.querySelectorAll('[data-opener-receiver]');

if( openerSenders != undefined && openerSenders.length > 0 && openerReceivers != undefined && openerReceivers.length > 0 ){
    
    openerSenders.forEach( sender => {
        const senderDataAtt = sender.getAttribute('data-opener-sender');
        const receiver = document.querySelector(`[data-opener-receiver="${senderDataAtt}"]`);

        if( receiver != undefined ){
            sender.addEventListener("click", function(){
                if(sender.classList.contains("closed")){
                    sender.classList.remove("closed");
                    sender.classList.add("opened");
                } else if ( sender.classList.contains("opened") ){
                    sender.classList.remove("opened");
                    sender.classList.add("closed");
                }
                
                if( receiver.classList.contains('closed') ){
                    receiver.classList.remove('closed');
                    receiver.classList.add('opened');
                } else if ( receiver.classList.contains('opened') ){
                    receiver.classList.remove('opened');
                    receiver.classList.add('closed');
                }
            });
        };
    });
};

/* === // toggle OPENERs to CLOSE and OPEN === */




/* === add ARROW-BTNs to LINKS in HEADER-MENU === */

headerMenuLisWithChildren_a?.forEach( link => {
    const btnElement = document.createElement('button');
    btnElement.classList.add('arrow-btn');
    link.insertAdjacentElement('afterend', btnElement);
});

/* === // add ARROW-BTNs to LINKS in HEADER-MENU === */




/* === append LEFT via ARROW-BTNs to .MENU in HEADER-MENU === */

const arrowBtns = header?.querySelectorAll('.arrow-btn');

arrowBtns?.forEach( btn => {
    const ulMenu = btn.closest('ul.menu') as HTMLElement;
    const ulSubMenus = ulMenu.querySelectorAll('ul.sub-menu');
    const curSubMenu = btn.nextElementSibling;
    const nav = btn.closest('nav') as HTMLElement;
    const lis = nav?.querySelectorAll('li.menu-item-has-children');
    const curLi = btn.closest('li.menu-item-has-children') as HTMLElement;

    btn.addEventListener('click', function(){
        if( !nav?.classList.contains('opened') ){
            nav?.classList.add('opened');
        }
        
        ulSubMenus?.forEach( subMenu => {
            if( subMenu == curSubMenu ){
                if( subMenu.classList.contains('visible') ){
                    subMenu.classList.remove('visible');
                    nav.classList.remove('opened');
                } else {
                    subMenu.classList.add('visible');
                }
            } else {
                subMenu.classList.remove('visible');
            }
        });

        if( winWidth >= 768 ){
            lis?.forEach( li => {
            
                const subMenu = li.querySelector('.sub-menu');
                if( li == curLi ){
                    if( subMenu?.classList.contains('visible') ){
                        li.classList.add('active');
                    } else {
                        li.classList.remove('active');
                    }
                } else {
                    li.classList.remove('active');
                }
            });
        } else {
            lis?.forEach( li => {
                li.classList.remove('active');
            });
        }
        
    });
});

/* === // append LEFT via ARROW-BTNs to .MENU in HEADER-MENU === */




/* === add ARROW-BTN--BACKs to SUB-MENUs in HEADER-MENU === */

headerMenuSubMenus.forEach( subMenu => {
    const btn = document.createElement('button');
    btn.innerText = "Zurück";
    btn.classList.add('arrow-btn--back');
    subMenu.insertAdjacentElement('afterbegin', btn);
});

/* === // add ARROW-BTN--BACKWARDs to SUB-MENUs in HEADER-MENU === */




/* === append LEFT via ARROW-BTN--BACKWARDs to SUB-MENUs in HEADER-MENU === */

const arrowBtnBacks = document.querySelectorAll('.arrow-btn--back');

arrowBtnBacks?.forEach( btn => {
    const nav = btn.closest('nav');
    const lis = btn.closest('nav')?.querySelectorAll('li.menu-item-has-children');
    btn.addEventListener('click', function(){
        lis?.forEach( li => {
            li.classList.remove('active');
        });
        nav?.classList.remove('opened');
    });
});

/* === // append LEFT via ARROW-BTN--BACKWARDs to SUB-MENUs in HEADER-MENU === */




/* === reset HEADER-MENU and QUICK-CALL-PANEs via MENU-BTN === */

headerMenuBtn?.addEventListener('click', function(){
    headerMenuReset();
    quickCallPaneReset();
    setTimeout(function(){
        adjustQuickCallPane();
    }, 200)
});

/* === // reset HEADER-MENU and QUICK-CALL-PANEs via MENU-BTN === */




/* === connect QUICK CALLS === */

const quickCallBtns = document.querySelectorAll('.quick-call-btn');

function setQuickPanesOpen(attr: string): void {
    const targetPane = document.querySelector('.quick-call-pane[data-quick-target="'+attr+'"]');
    if( targetPane != undefined ){
        if( targetPane.classList.contains( 'quick-call-pane--opened' ) ){
            targetPane.classList.remove('quick-call-pane--opened');
        } else {
            targetPane.classList.add('quick-call-pane--opened');

        }
    }    
}

function connectQuickCalls(): void {
    quickCallBtns.forEach( btn => {
        const dataCallValue = btn.getAttribute('data-quick-call');
        if( dataCallValue != undefined ){
            const dataTarget = document.querySelector('.quick-call-pane[data-quick-target="'+dataCallValue+'"]');
            if( dataTarget != undefined ){
                btn.addEventListener('click', function(){
                    setQuickPanesOpen(dataCallValue);
                });
            }
        }
    })
}

/* === // connect QUICK CALLS === */




/* === reorder HEAD-SLIDER CONTENT === */

const headSlider = document.querySelector('#head-slider');

function reorderSliderContent():void {
    if( headSlider != undefined ){
        const slidesList = headSlider.querySelector('.slick-list');
        const dots = headSlider.querySelector('ul');
        if( dots != undefined ){
            dots.classList.add('order-1');
        }
        if( slidesList != undefined ){
            slidesList.classList.add('order-2');
        }
    }
}

/* === // reorder HEAD-SLIDER CONTENT === */




/* === add / remove CLASSES to SERVICE-TILE in SERVICES-TILES-BLOCK === */

const servicesTilesBlocks = document.querySelectorAll('.services-tiles-block');

servicesTilesBlocks?.forEach( block => {
    const tiles = block.querySelectorAll('.service-tile');
    for( let i = 0; i < tiles.length; i++ ){
        if( i % 2 === 0 ){
            tiles[i].classList.add('ps-xl-7', 'ps-xxl-9', 'ps-xxxl-12');
            tiles[i].querySelector('.service-tile-wrap')?.classList.add('pe-xl-4', 'pe-xxl-5', 'pe-xxxl-6');
        } else {
            tiles[i].classList.add('pe-xl-7', 'pe-xxl-9', 'pe-xxxl-12');
            tiles[i].querySelector('.service-tile-wrap')?.classList.add('ps-xl-4', 'ps-xxl-5', 'ps-xxxl-6');
        }

        if( i === tiles.length - 1 || i === tiles.length - 2 ){
            tiles[i].classList.add('pb-xl-0');
            tiles[i].querySelector('.service-tile-wrap')?.classList.remove('pb-xl-5', 'border-bottom-xl');
        }
    }
} );

/* === // add / remove CLASSES to SERVICE-TILE in SERVICES-TILES-BLOCK === */




/* === add TILE-BORDERs to SERVICE-TILE in SERVICES-TILES-BLOCK === */

servicesTilesBlocks?.forEach( block => {
    const tiles = block.querySelectorAll('.service-tile');

    for( let i=0; i < tiles.length; i=i+2 ){
        const box = document.createElement('div');
        box.classList.add('odd-tile-border');
        tiles[i].insertAdjacentElement('beforeend', box);
    }
});

/* === // add TILE-BORDERs to SERVICE-TILE in SERVICES-TILES-BLOCK === */




/* === add CLASSES to TILE-BORDERs in SERVICE-TILEs === */

const tileBorders = document.querySelectorAll('.odd-tile-border');
tileBorders[0]?.classList.add('odd-tile-border--first');
tileBorders[tileBorders.length - 1]?.classList.add('odd-tile-border--last');

/* === // add CLASSES to TILE-BORDERs in SERVICE-TILEs === */




/* === set ARROWs to BTNs === */

function setArrowsToBtns(): void {
    const btns = document.querySelectorAll('.btn');
    btns?.forEach( btn => {
        const span = document.createElement('span');
        span.classList.add('arrow');
        btn.insertAdjacentElement('beforeend', span);
    });
}

/* === // set ARROWs to BTNs === */




/* === add PLACEHOLDER and set REQUIRED to TEXTAREA === */

const textarea = document.querySelector('form textarea#message');
textarea?.setAttribute('placeholder', 'Ihre Nachricht *');
const required: string | undefined | null = textarea?.getAttribute('aria-required');

if( required === 'true' ) {
    textarea?.setAttribute('required', 'true');
}

/* === // add PLACEHOLDER and set REQUIRED to TEXTAREA === */




/* === add EVENT-LISTENER to CLOSE BTN in AVIS in HEADER-SLIDER === */

const avisBtn = document.querySelector('.avis .avis__btn');
avisBtn?.addEventListener('click', function(): void {
    const avis = avisBtn.closest('.avis') as HTMLElement;
    if( avis != undefined ){
        avis.style.display = 'none';
    }
});

/* === // add EVENT-LISTENER to CLOSE BTN in AVIS in HEADER-SLIDER === */




/* === set MAX-WIDTH to HEADER__LOGO A while SCROLLing === */

const homeHeader = document.querySelector('.home header');
const logoLink = homeHeader?.querySelector('#header__logo > a');

function maxWidthHeaderLogo(): void {
    const winOffsetTop = window.scrollY;
    if( winOffsetTop >= 100 ){
        logoLink?.classList.add('shrinked');
    } else {
        logoLink?.classList.remove('shrinked');
    }
}

/* === // set MAX-WIDTH to HEADER__LOGO A while SCROLLing === */




/* === add CLASSes to TEXT-BIO-IMGs === */

const textBioImgs_imgText = document.querySelectorAll('.text-bio-img--img-text');
const textBioImgs_textImg = document.querySelectorAll('.text-bio-img--text-img');

textBioImgs_imgText?.forEach( block => {
    const firstCol = block.querySelector('.order-md-0');
    const secondCol = block.querySelector('.order-md-1');
    firstCol?.classList.add('ps-lg-4', 'ps-xl-7', 'ps-xxl-9', 'ps-xxxl-12', 'pe-xl-0');
    secondCol?.classList.add('ps-xl-7', 'ps-xxl-9', 'ps-xxxl-11', 'pe-lg-4', 'pe-xl-7', 'pe-xxl-9', 'pe-xxxl-12');
});

textBioImgs_textImg?.forEach( block => {
    const firstCol = block.querySelector('.order-md-0');
    const secondCol = block.querySelector('.order-md-1');
    firstCol?.classList.add('pe-xl-7', 'pe-xxl-9', 'pe-xxxl-11', 'ps-lg-4', 'ps-xl-7', 'ps-xxl-9', 'ps-xxxl-12');
    secondCol?.classList.add('pe-lg-4', 'pe-xl-7', 'pe-xxl-9', 'pe-xxxl-12', 'ps-xl-0');
});

/* === add CLASSes to TEXT-BIO-IMGs === */




document.addEventListener('DOMContentLoaded', function(): void {
    connectQuickCalls();
    setArrowsToBtns();
    adjustQuickCallPane();
});

window.addEventListener('resize', function(): void {
    winWidth = setWinWidth();
    evalHeaderHeight();
    paddingTopPTHeaders();
    paddingTopHeaderMenu();
    maxWidthHeaderLogo();
    adjustQuickCallPane();
});

window.addEventListener('load', function(): void {
    winWidth = setWinWidth();
    evalHeaderHeight();
    paddingTopPTHeaders();
    paddingTopHeaderMenu();
    maxWidthHeaderLogo();
    adjustQuickCallPane();
});

window.addEventListener("orientationchange", function() {
    winWidth = setWinWidth();
    evalHeaderHeight();
    paddingTopPTHeaders();
    paddingTopHeaderMenu();
    maxWidthHeaderLogo();
    adjustQuickCallPane();
});

window.addEventListener('scroll', function(): void {
    maxWidthHeaderLogo();
});


