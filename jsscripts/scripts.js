"use strict";
var _a, _b;
const body = document.querySelector('body');
const header = document.querySelector('header');
const headerMenu = header === null || header === void 0 ? void 0 : header.querySelector('#header__menu');
const headerMenuNav = header === null || header === void 0 ? void 0 : header.querySelector('#header__menu > nav');
const headerUtils = header === null || header === void 0 ? void 0 : header.querySelector('#header__utils');
const headerMenuBtn = header === null || header === void 0 ? void 0 : header.querySelector('#header__menu-btn');
const headerMenuLisWithChildren_a = header === null || header === void 0 ? void 0 : header.querySelectorAll('li.menu-item-has-children > a');
const headerMenuSubMenus = headerMenu === null || headerMenu === void 0 ? void 0 : headerMenu.querySelectorAll('.sub-menu');
let winWidth;
let headerHeight;
function setWinWidth() {
    return window.innerWidth;
}
function getTotalWidth(element) {
    const computedStyle = window.getComputedStyle(element);
    const totalWidth = element.getBoundingClientRect().width +
        parseInt(computedStyle.marginLeft) +
        parseInt(computedStyle.marginRight) +
        parseInt(computedStyle.paddingLeft) +
        parseInt(computedStyle.paddingRight);
    return totalWidth;
}
function getTotalHeight(element) {
    const computedStyle = window.getComputedStyle(element);
    const totalHeight = element.getBoundingClientRect().height +
        parseInt(computedStyle.marginTop) +
        parseInt(computedStyle.marginBottom) +
        parseInt(computedStyle.paddingTop) +
        parseInt(computedStyle.paddingBottom);
    return totalHeight;
}
function headerMenuReset() {
    if (headerMenuNav === null || headerMenuNav === void 0 ? void 0 : headerMenuNav.classList.contains('opened')) {
        headerMenuNav === null || headerMenuNav === void 0 ? void 0 : headerMenuNav.classList.remove('opened');
    }
}
const quickCallPanes = document.querySelectorAll('.quick-call-pane');
function adjustQuickCallPane() {
    quickCallPanes === null || quickCallPanes === void 0 ? void 0 : quickCallPanes.forEach(pane => {
        const targetVal = pane.getAttribute('data-quick-target');
        const triggerElem = document.querySelector(`[data-quick-call="${targetVal}"]`);
        const top = triggerElem === null || triggerElem === void 0 ? void 0 : triggerElem.getBoundingClientRect().top;
        const height = triggerElem === null || triggerElem === void 0 ? void 0 : triggerElem.getBoundingClientRect().height;
        const left = triggerElem === null || triggerElem === void 0 ? void 0 : triggerElem.getBoundingClientRect().left;
        pane.style.top = top + height + 'px';
        pane.style.left = left + 'px';
        checkFullWidthQuickCallPane(pane);
    });
}
function checkFullWidthQuickCallPane(pane) {
    if (winWidth <= 480) {
        pane.classList.add('quick-call-pane--full');
    }
    else {
        pane.classList.remove('quick-call-pane--full');
    }
}
;
quickCallPanes === null || quickCallPanes === void 0 ? void 0 : quickCallPanes.forEach(pane => {
    const closeBtn = pane.querySelector('.quick-call-pane__btn');
    closeBtn === null || closeBtn === void 0 ? void 0 : closeBtn.addEventListener('click', function () {
        pane.classList.remove('quick-call-pane--opened');
    });
});
function quickCallPaneReset() {
    quickCallPanes === null || quickCallPanes === void 0 ? void 0 : quickCallPanes.forEach(pane => {
        pane.classList.remove('quick-call-pane--opened');
    });
}
function evalHeaderHeight() {
    if (header != undefined) {
        headerHeight = getTotalHeight(header);
    }
}
const ptHeaders = document.querySelectorAll('.pt-header');
function paddingTopPTHeaders() {
    ptHeaders === null || ptHeaders === void 0 ? void 0 : ptHeaders.forEach(ptHeader => {
        ptHeader.style.paddingTop = headerHeight + 'px';
    });
}
function paddingTopHeaderMenu() {
    const headerUtilsHeight = getTotalHeight(headerUtils);
    if (body === null || body === void 0 ? void 0 : body.classList.contains('home')) {
        if (winWidth >= 768) {
            headerMenu.style.paddingTop = headerUtilsHeight + 'px';
        }
        else {
            headerMenu.style.paddingTop = headerHeight + 'px';
        }
    }
    else {
        headerMenu.style.paddingTop = headerHeight + 'px';
    }
}
headerMenuBtn.addEventListener('click', function () {
    if (headerMenuBtn.classList.contains('opened')) {
        headerUtils.classList.remove('bg-blue');
        headerUtils.classList.remove('color-white');
        headerUtils.classList.add('bg-md-white');
    }
    else {
        headerUtils.classList.add('bg-blue');
        headerUtils.classList.add('color-white');
        headerUtils.classList.remove('bg-md-white');
    }
});
const openerSenders = document.querySelectorAll('[data-opener-sender]');
const openerReceivers = document.querySelectorAll('[data-opener-receiver]');
if (openerSenders != undefined && openerSenders.length > 0 && openerReceivers != undefined && openerReceivers.length > 0) {
    openerSenders.forEach(sender => {
        const senderDataAtt = sender.getAttribute('data-opener-sender');
        const receiver = document.querySelector(`[data-opener-receiver="${senderDataAtt}"]`);
        if (receiver != undefined) {
            sender.addEventListener("click", function () {
                if (sender.classList.contains("closed")) {
                    sender.classList.remove("closed");
                    sender.classList.add("opened");
                }
                else if (sender.classList.contains("opened")) {
                    sender.classList.remove("opened");
                    sender.classList.add("closed");
                }
                if (receiver.classList.contains('closed')) {
                    receiver.classList.remove('closed');
                    receiver.classList.add('opened');
                }
                else if (receiver.classList.contains('opened')) {
                    receiver.classList.remove('opened');
                    receiver.classList.add('closed');
                }
            });
        }
        ;
    });
}
;
headerMenuLisWithChildren_a === null || headerMenuLisWithChildren_a === void 0 ? void 0 : headerMenuLisWithChildren_a.forEach(link => {
    const btnElement = document.createElement('button');
    btnElement.classList.add('arrow-btn');
    link.insertAdjacentElement('afterend', btnElement);
});
const arrowBtns = header === null || header === void 0 ? void 0 : header.querySelectorAll('.arrow-btn');
arrowBtns === null || arrowBtns === void 0 ? void 0 : arrowBtns.forEach(btn => {
    const ulMenu = btn.closest('ul.menu');
    const ulSubMenus = ulMenu.querySelectorAll('ul.sub-menu');
    const curSubMenu = btn.nextElementSibling;
    const nav = btn.closest('nav');
    const lis = nav === null || nav === void 0 ? void 0 : nav.querySelectorAll('li.menu-item-has-children');
    const curLi = btn.closest('li.menu-item-has-children');
    btn.addEventListener('click', function () {
        if (!(nav === null || nav === void 0 ? void 0 : nav.classList.contains('opened'))) {
            nav === null || nav === void 0 ? void 0 : nav.classList.add('opened');
        }
        ulSubMenus === null || ulSubMenus === void 0 ? void 0 : ulSubMenus.forEach(subMenu => {
            if (subMenu == curSubMenu) {
                if (subMenu.classList.contains('visible')) {
                    subMenu.classList.remove('visible');
                    nav.classList.remove('opened');
                }
                else {
                    subMenu.classList.add('visible');
                }
            }
            else {
                subMenu.classList.remove('visible');
            }
        });
        if (winWidth >= 768) {
            lis === null || lis === void 0 ? void 0 : lis.forEach(li => {
                const subMenu = li.querySelector('.sub-menu');
                if (li == curLi) {
                    if (subMenu === null || subMenu === void 0 ? void 0 : subMenu.classList.contains('visible')) {
                        li.classList.add('active');
                    }
                    else {
                        li.classList.remove('active');
                    }
                }
                else {
                    li.classList.remove('active');
                }
            });
        }
        else {
            lis === null || lis === void 0 ? void 0 : lis.forEach(li => {
                li.classList.remove('active');
            });
        }
    });
});
headerMenuSubMenus.forEach(subMenu => {
    const btn = document.createElement('button');
    btn.innerText = "Zurück";
    btn.classList.add('arrow-btn--back');
    subMenu.insertAdjacentElement('afterbegin', btn);
});
const arrowBtnBacks = document.querySelectorAll('.arrow-btn--back');
arrowBtnBacks === null || arrowBtnBacks === void 0 ? void 0 : arrowBtnBacks.forEach(btn => {
    var _a;
    const nav = btn.closest('nav');
    const lis = (_a = btn.closest('nav')) === null || _a === void 0 ? void 0 : _a.querySelectorAll('li.menu-item-has-children');
    btn.addEventListener('click', function () {
        lis === null || lis === void 0 ? void 0 : lis.forEach(li => {
            li.classList.remove('active');
        });
        nav === null || nav === void 0 ? void 0 : nav.classList.remove('opened');
    });
});
headerMenuBtn === null || headerMenuBtn === void 0 ? void 0 : headerMenuBtn.addEventListener('click', function () {
    headerMenuReset();
    quickCallPaneReset();
    setTimeout(function () {
        adjustQuickCallPane();
    }, 200);
});
const quickCallBtns = document.querySelectorAll('.quick-call-btn');
function setQuickPanesOpen(attr) {
    const targetPane = document.querySelector('.quick-call-pane[data-quick-target="' + attr + '"]');
    if (targetPane != undefined) {
        if (targetPane.classList.contains('quick-call-pane--opened')) {
            targetPane.classList.remove('quick-call-pane--opened');
        }
        else {
            targetPane.classList.add('quick-call-pane--opened');
        }
    }
}
function connectQuickCalls() {
    quickCallBtns.forEach(btn => {
        const dataCallValue = btn.getAttribute('data-quick-call');
        if (dataCallValue != undefined) {
            const dataTarget = document.querySelector('.quick-call-pane[data-quick-target="' + dataCallValue + '"]');
            if (dataTarget != undefined) {
                btn.addEventListener('click', function () {
                    setQuickPanesOpen(dataCallValue);
                });
            }
        }
    });
}
const headSlider = document.querySelector('#head-slider');
function reorderSliderContent() {
    if (headSlider != undefined) {
        const slidesList = headSlider.querySelector('.slick-list');
        const dots = headSlider.querySelector('ul');
        if (dots != undefined) {
            dots.classList.add('order-1');
        }
        if (slidesList != undefined) {
            slidesList.classList.add('order-2');
        }
    }
}
const servicesTilesBlocks = document.querySelectorAll('.services-tiles-block');
servicesTilesBlocks === null || servicesTilesBlocks === void 0 ? void 0 : servicesTilesBlocks.forEach(block => {
    var _a, _b, _c;
    const tiles = block.querySelectorAll('.service-tile');
    for (let i = 0; i < tiles.length; i++) {
        if (i % 2 === 0) {
            tiles[i].classList.add('ps-xl-7', 'ps-xxl-9', 'ps-xxxl-12');
            (_a = tiles[i].querySelector('.service-tile-wrap')) === null || _a === void 0 ? void 0 : _a.classList.add('pe-xl-4', 'pe-xxl-5', 'pe-xxxl-6');
        }
        else {
            tiles[i].classList.add('pe-xl-7', 'pe-xxl-9', 'pe-xxxl-12');
            (_b = tiles[i].querySelector('.service-tile-wrap')) === null || _b === void 0 ? void 0 : _b.classList.add('ps-xl-4', 'ps-xxl-5', 'ps-xxxl-6');
        }
        if (i === tiles.length - 1 || i === tiles.length - 2) {
            tiles[i].classList.add('pb-xl-0');
            (_c = tiles[i].querySelector('.service-tile-wrap')) === null || _c === void 0 ? void 0 : _c.classList.remove('pb-xl-5', 'border-bottom-xl');
        }
    }
});
servicesTilesBlocks === null || servicesTilesBlocks === void 0 ? void 0 : servicesTilesBlocks.forEach(block => {
    const tiles = block.querySelectorAll('.service-tile');
    for (let i = 0; i < tiles.length; i = i + 2) {
        const box = document.createElement('div');
        box.classList.add('odd-tile-border');
        tiles[i].insertAdjacentElement('beforeend', box);
    }
});
const tileBorders = document.querySelectorAll('.odd-tile-border');
(_a = tileBorders[0]) === null || _a === void 0 ? void 0 : _a.classList.add('odd-tile-border--first');
(_b = tileBorders[tileBorders.length - 1]) === null || _b === void 0 ? void 0 : _b.classList.add('odd-tile-border--last');
function setArrowsToBtns() {
    const btns = document.querySelectorAll('.btn');
    btns === null || btns === void 0 ? void 0 : btns.forEach(btn => {
        const span = document.createElement('span');
        span.classList.add('arrow');
        btn.insertAdjacentElement('beforeend', span);
    });
}
const textarea = document.querySelector('form textarea#message');
textarea === null || textarea === void 0 ? void 0 : textarea.setAttribute('placeholder', 'Ihre Nachricht *');
const required = textarea === null || textarea === void 0 ? void 0 : textarea.getAttribute('aria-required');
if (required === 'true') {
    textarea === null || textarea === void 0 ? void 0 : textarea.setAttribute('required', 'true');
}
const avisBtn = document.querySelector('.avis .avis__btn');
avisBtn === null || avisBtn === void 0 ? void 0 : avisBtn.addEventListener('click', function () {
    const avis = avisBtn.closest('.avis');
    if (avis != undefined) {
        avis.style.display = 'none';
    }
});
const homeHeader = document.querySelector('.home header');
const logoLink = homeHeader === null || homeHeader === void 0 ? void 0 : homeHeader.querySelector('#header__logo > a');
function maxWidthHeaderLogo() {
    const winOffsetTop = window.scrollY;
    if (winOffsetTop >= 100) {
        logoLink === null || logoLink === void 0 ? void 0 : logoLink.classList.add('shrinked');
    }
    else {
        logoLink === null || logoLink === void 0 ? void 0 : logoLink.classList.remove('shrinked');
    }
}
const textBioImgs_imgText = document.querySelectorAll('.text-bio-img--img-text');
const textBioImgs_textImg = document.querySelectorAll('.text-bio-img--text-img');
textBioImgs_imgText === null || textBioImgs_imgText === void 0 ? void 0 : textBioImgs_imgText.forEach(block => {
    const firstCol = block.querySelector('.order-md-0');
    const secondCol = block.querySelector('.order-md-1');
    firstCol === null || firstCol === void 0 ? void 0 : firstCol.classList.add('ps-lg-4', 'ps-xl-7', 'ps-xxl-9', 'ps-xxxl-12', 'pe-xl-0');
    secondCol === null || secondCol === void 0 ? void 0 : secondCol.classList.add('ps-xl-7', 'ps-xxl-9', 'ps-xxxl-11', 'pe-lg-4', 'pe-xl-7', 'pe-xxl-9', 'pe-xxxl-12');
});
textBioImgs_textImg === null || textBioImgs_textImg === void 0 ? void 0 : textBioImgs_textImg.forEach(block => {
    const firstCol = block.querySelector('.order-md-0');
    const secondCol = block.querySelector('.order-md-1');
    firstCol === null || firstCol === void 0 ? void 0 : firstCol.classList.add('pe-xl-7', 'pe-xxl-9', 'pe-xxxl-11', 'ps-lg-4', 'ps-xl-7', 'ps-xxl-9', 'ps-xxxl-12');
    secondCol === null || secondCol === void 0 ? void 0 : secondCol.classList.add('pe-lg-4', 'pe-xl-7', 'pe-xxl-9', 'pe-xxxl-12', 'ps-xl-0');
});
document.addEventListener('DOMContentLoaded', function () {
    connectQuickCalls();
    setArrowsToBtns();
    adjustQuickCallPane();
});
window.addEventListener('resize', function () {
    winWidth = setWinWidth();
    evalHeaderHeight();
    paddingTopPTHeaders();
    paddingTopHeaderMenu();
    maxWidthHeaderLogo();
    adjustQuickCallPane();
});
window.addEventListener('load', function () {
    winWidth = setWinWidth();
    evalHeaderHeight();
    paddingTopPTHeaders();
    paddingTopHeaderMenu();
    maxWidthHeaderLogo();
    adjustQuickCallPane();
});
window.addEventListener("orientationchange", function () {
    winWidth = setWinWidth();
    evalHeaderHeight();
    paddingTopPTHeaders();
    paddingTopHeaderMenu();
    maxWidthHeaderLogo();
    adjustQuickCallPane();
});
window.addEventListener('scroll', function () {
    maxWidthHeaderLogo();
});
