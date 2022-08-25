<?php

namespace Be\Theme\ShopFai\Section\Header;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['north'];

    private function css()
    {
        echo '<style type="text/css">';

        echo '#' . $this->id . ' .header-mobile,';
        echo '#' . $this->id . ' .header-desktop {';
        echo 'background-color: var(--main-color);';
        echo '}';

        echo '#' . $this->id . ' .header-icon {';
        echo 'display: inline-block;';
        echo 'border: none;';
        echo 'background-repeat: no-repeat;';
        echo 'background-position: center center;';
        echo 'cursor: pointer;';
        echo '}';

        echo '#' . $this->id . ' .header-icon-search {';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'%23fff\' d=\'M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z\'/%3e%3c/svg%3e");';
        echo '}';

        echo '#' . $this->id . ' .header-icon-menu {';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'%23fff\' d=\'M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\'/%3e%3c/svg%3e");';
        echo '}';

        echo '#' . $this->id . ' .header-icon-wishlist {';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 512 512\'%3e%3cpath fill=\'%23fff\' d=\'M474.644,74.27C449.391,45.616,414.358,29.836,376,29.836c-53.948,0-88.103,32.22-107.255,59.25 c-4.969,7.014-9.196,14.047-12.745,20.665c-3.549-6.618-7.775-13.651-12.745-20.665c-19.152-27.03-53.307-59.25-107.255-59.25 c-38.358,0-73.391,15.781-98.645,44.435C13.267,101.605,0,138.213,0,177.351c0,42.603,16.633,82.228,52.345,124.7 c31.917,37.96,77.834,77.088,131.005,122.397c19.813,16.884,40.302,34.344,62.115,53.429l0.655,0.574 c2.828,2.476,6.354,3.713,9.88,3.713s7.052-1.238,9.88-3.713l0.655-0.574c21.813-19.085,42.302-36.544,62.118-53.431 c53.168-45.306,99.085-84.434,131.002-122.395C495.367,259.578,512,219.954,512,177.351 C512,138.213,498.733,101.605,474.644,74.27z M309.193,401.614c-17.08,14.554-34.658,29.533-53.193,45.646 c-18.534-16.111-36.113-31.091-53.196-45.648C98.745,312.939,30,254.358,30,177.351c0-31.83,10.605-61.394,29.862-83.245 C79.34,72.007,106.379,59.836,136,59.836c41.129,0,67.716,25.338,82.776,46.594c13.509,19.064,20.558,38.282,22.962,45.659 c2.011,6.175,7.768,10.354,14.262,10.354c6.494,0,12.251-4.179,14.262-10.354c2.404-7.377,9.453-26.595,22.962-45.66 c15.06-21.255,41.647-46.593,82.776-46.593c29.621,0,56.66,12.171,76.137,34.27C471.395,115.957,482,145.521,482,177.351 C482,254.358,413.255,312.939,309.193,401.614z\'%3e%3c/path%3e%3c/svg%3e");';
        echo '}';

        echo '#' . $this->id . ' .header-icon-user {';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1024 1024\'%3e%3cpath fill=\'%23fff\' d=\'M486.4 563.2c-155.275 0-281.6-126.325-281.6-281.6s126.325-281.6 281.6-281.6 281.6 126.325 281.6 281.6-126.325 281.6-281.6 281.6zM486.4 51.2c-127.043 0-230.4 103.357-230.4 230.4s103.357 230.4 230.4 230.4c127.042 0 230.4-103.357 230.4-230.4s-103.358-230.4-230.4-230.4z\'%3e%3c/path%3e%3cpath fill=\'%23fff\' d=\'M896 1024h-819.2c-42.347 0-76.8-34.451-76.8-76.8 0-3.485 0.712-86.285 62.72-168.96 36.094-48.126 85.514-86.36 146.883-113.634 74.957-33.314 168.085-50.206 276.797-50.206 108.71 0 201.838 16.893 276.797 50.206 61.37 27.275 110.789 65.507 146.883 113.634 62.008 82.675 62.72 165.475 62.72 168.96 0 42.349-34.451 76.8-76.8 76.8zM486.4 665.6c-178.52 0-310.267 48.789-381 141.093-53.011 69.174-54.195 139.904-54.2 140.61 0 14.013 11.485 25.498 25.6 25.498h819.2c14.115 0 25.6-11.485 25.6-25.6-0.006-0.603-1.189-71.333-54.198-140.507-70.734-92.304-202.483-141.093-381.002-141.093z\'%3e%3c/path%3e%3c/svg%3e");';
        echo '}';

        echo '#' . $this->id . ' .header-icon-cart {';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 1024 1024\'%3e%3cpath fill=\'%23fff\' d=\'M409.6 1024c-56.464 0-102.4-45.936-102.4-102.4s45.936-102.4 102.4-102.4S512 865.136 512 921.6 466.064 1024 409.6 1024zm0-153.6c-28.232 0-51.2 22.968-51.2 51.2s22.968 51.2 51.2 51.2 51.2-22.968 51.2-51.2-22.968-51.2-51.2-51.2z\'%3e%3c/path%3e%3cpath fill=\'%23fff\' d=\'M768 1024c-56.464 0-102.4-45.936-102.4-102.4S711.536 819.2 768 819.2s102.4 45.936 102.4 102.4S824.464 1024 768 1024zm0-153.6c-28.232 0-51.2 22.968-51.2 51.2s22.968 51.2 51.2 51.2 51.2-22.968 51.2-51.2-22.968-51.2-51.2-51.2z\'%3e%3c/path%3e%3cpath fill=\'%23fff\' d=\'M898.021 228.688C885.162 213.507 865.763 204.8 844.8 204.8H217.954l-5.085-30.506C206.149 133.979 168.871 102.4 128 102.4H76.8c-14.138 0-25.6 11.462-25.6 25.6s11.462 25.6 25.6 25.6H128c15.722 0 31.781 13.603 34.366 29.112l85.566 513.395C254.65 736.421 291.929 768 332.799 768h512c14.139 0 25.6-11.461 25.6-25.6s-11.461-25.6-25.6-25.6h-512c-15.722 0-31.781-13.603-34.366-29.11l-12.63-75.784 510.206-44.366c39.69-3.451 75.907-36.938 82.458-76.234l34.366-206.194c3.448-20.677-1.952-41.243-14.813-56.424zm-35.69 48.006l-34.366 206.194c-2.699 16.186-20.043 32.221-36.39 33.645l-514.214 44.714-50.874-305.246h618.314c5.968 0 10.995 2.054 14.155 5.782 3.157 3.73 4.357 9.024 3.376 14.912z\'%3e%3c/path%3e%3c/svg%3e");';
        echo '}';

        // 手机端
        echo '@media (max-width: 991px) {';
        echo '#' . $this->id . ' {';
        echo 'height: 5rem;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile {';
        echo 'display: block;';
        echo 'position: fixed;';
        echo 'width: 100%;';
        echo 'z-index: 100;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop {';
        echo 'display: none;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-row {';
        echo 'display: flex;';
        echo 'flex-wrap: wrap;';
        echo 'justify-content: space-between;';
        echo 'align-items: center;';
        echo 'padding: 0.5rem 0;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbars {';
        echo 'flex: 0 1 auto;';
        echo 'display: flex;';
        echo 'justify-content: flex-end;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbar {';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbar a {';
        echo 'display: block;';
        echo 'color: #fff;';
        echo 'text-align: center;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbar a:hover  {';
        echo 'text-decoration: none;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbar-menu  {';
        echo 'margin-right: 1rem;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbar-menu .header-icon-menu {';
        echo 'width: 30px;';
        echo 'height: 28px;';
        echo 'background-size: 30px 28px;';
        echo 'margin-top: 2px;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbar-search  {';
        echo 'margin-right: 1rem;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-left-toolbar-search .header-icon-search {';
        echo 'width: 30px;';
        echo 'height: 28px;';
        echo 'background-size: 30px 28px;';
        echo 'margin-top: 2px;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-logo {';
        echo 'flex: 0 1 auto;';
        echo 'max-width: 160px;';
        echo '}';

        if ($this->config->logoType == 'text') {
            echo '#' . $this->id . ' .header-mobile-logo a {';
            echo 'color: #fff;';
            echo 'font-size: 30px;';
            echo 'line-height: 30px;';
            echo '}';

            echo '#' . $this->id . ' .header-mobile-logo a:hover {';
            echo 'text-decoration: none;';
            echo '}';
        } else {
            echo '#' . $this->id . ' .header-mobile-logo img {';
            echo 'max-width: 100%;';
            echo 'max-height: 3rem;';
            echo '}';
        }

        echo '#' . $this->id . ' .header-mobile-right-toolbars {';
        echo 'flex: 0 1 auto;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar {';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar a {';
        echo 'display: block;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar-user {';
        echo 'margin-right: 1rem;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar-user .header-icon-user {';
        echo 'width: 30px;';
        echo 'height: 28px;';
        echo 'background-size: 30px 28px;';
        echo 'margin-top: 2px;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar-cart {';
        echo 'position: relative;';
        if (isset($this->hideHeaderCart) && $this->hideHeaderCart) {
            echo 'display: none;';
        }
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar-cart a {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar-user .header-icon-cart {';
        echo 'width: 30px;';
        echo 'height: 30px;';
        echo 'background-size: 30px 30px;';
        echo '}';

        echo '#' . $this->id . ' .header-mobile-right-toolbar-user .header-toolbar-cart-counter {';
        echo 'position: absolute;';
        echo 'top: -4px;';
        echo 'right: -4px;';
        echo 'min-width: 20px;';
        echo 'height: 20px;';
        echo 'line-height: 20px;';
        echo 'border-radius: 50%;';
        echo 'font-size: 12px;';
        echo 'background-color: #fff;';
        echo 'color: var(--main-color);';
        echo 'text-align: center;';
        echo '}';

        echo '}';

        // 电脑端
        echo '@media (min-width: 992px) {';

        echo '#' . $this->id . ' .header-mobile {';
        echo 'display: none;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop {';
        echo 'display: block;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-top {';
        echo 'position: relative;';
        echo 'z-index: 0;';
        echo '}';

        echo '.js-open-layer-header-desktop-search #' . $this->id . ' .header-desktop-top {';
        echo 'z-index: 1010;';
        echo '}';

        echo '.js-open-drawer #' . $this->id . ' .header-desktop-top {';
        echo 'z-index: 900 !important;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-row {';
        echo 'display: flex;';
        echo 'flex-wrap: wrap;';
        echo 'justify-content: space-between;';
        echo 'align-items: center;';
        echo 'padding: 1rem 0;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-logo {';
        echo 'flex: 0 1 auto;';
        echo '}';


        if ($this->config->logoType == 'text') {
            echo '#' . $this->id . ' .header-desktop-logo a {';
            echo 'color: #fff;';
            echo 'font-size: 30px;';
            echo 'line-height: 30px;';
            echo '}';

            echo '#' . $this->id . ' .header-desktop-logo a:hover {';
            echo 'text-decoration: none;';
            echo '}';
        } else {
            echo '#' . $this->id . ' .header-desktop-logo img {';
            if ($this->config->logoImageMaxWidth) {
                echo 'max-width:' . $this->config->logoImageMaxWidth . 'px;';
            }
            if ($this->config->logoImageMaxHeight) {
                echo 'max-height:' . min($this->config->logoImageMaxHeight, 90) . 'px;';
            }
            echo '}';
        }

        echo '#' . $this->id . ' .header-desktop-search {';
        echo 'flex: 1 1 auto;';
        echo 'padding-left: 10%;';
        echo 'padding-right: 10%;';
        echo 'padding-top: 5px;';
        echo 'padding-bottom: 5px;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-form {';
        echo 'display: flex;';
        echo 'flex-wrap: wrap;';
        echo 'justify-content: space-between;';
        echo 'background-color: #fff;';
        echo 'border-radius: 30px;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-form-input {';
        echo 'flex: 0 1 auto;';
        echo 'padding: 13px 18px 13px;';
        echo 'color: #808080;';
        echo 'font-size: 16px;';
        echo 'width: calc(100% - 50px);';
        echo 'border: none;';
        echo 'outline: none;';
        echo 'background-color: #fff;';
        echo 'border-radius: 30px;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-form-submit {';
        echo 'flex: 1 1 auto;';
        echo 'color: var(--main-color);';
        echo 'border: none;';
        echo 'outline: none;';
        echo 'background-color: #fff;';
        echo 'border-radius: 30px;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-form-submit svg {';
        echo 'width: 28px;';
        echo 'fill: currentColor;';
        echo 'stroke: currentColor;';
        echo 'vertical-align: middle;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-keywords {';
        echo 'position: absolute;';
        echo 'left: 0;';
        echo 'right: 0;';
        echo 'padding: 2rem 0;';
        echo 'background-color: #fff;';
        echo 'margin-top: 0;';
        echo 'transition: all .3s ease;';
        echo 'opacity: 0;';
        echo 'z-index: 1020;';
        echo 'visibility: hidden;';
        echo '}';

        echo '.js-open-layer-header-desktop-search #' . $this->id . ' .header-desktop-search-keywords {';
        echo 'margin-top: 10px;';
        echo 'opacity: 1;';
        echo 'visibility: visible;';
        echo '}';

        echo '.js-open-drawer #' . $this->id . ' .header-desktop-search-keywords {';
        echo 'z-index: 910 !important;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-keywords-close {';
        echo 'position: absolute;';
        echo 'right: 0;';
        echo 'top: 0;';
        echo 'width: 35px;';
        echo 'height: 35px;';
        echo 'border: none;';
        echo 'background-color: #bbb;';
        echo 'color: #fff;';
        echo 'border-radius: 10px;';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 320 512\'%3e%3cpath fill=\'%23fff\' d=\'M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z\'%3e%3c/path%3e%3c/svg%3e");';
        echo 'background-repeat: no-repeat;';
        echo 'background-position: center center;';
        echo 'background-size: 20px 20px;';
        echo 'cursor: pointer;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-keywords-close:hover {';
        echo 'background-color: #999;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-keyword {';
        echo 'display: inline-block;';
        echo 'font-size: .8rem;';
        echo 'line-height: 1rem;';
        echo 'padding: .8rem 2.2rem .8rem .8rem;';
        echo 'margin: 0 .8rem .5rem 0;';
        echo 'color: #666;';
        echo 'border: #ddd 1px solid;';
        echo 'border-radius: .5rem;';
        echo 'background-color: transparent;';
        echo 'background-repeat: no-repeat;';
        echo 'background-position: right .8rem center;';
        echo 'background-size: .8rem .8rem;';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'%23999\' d=\'M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\'/%3e%3c/svg%3e");';
        echo 'transition: all .3s ease;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-search-keyword:hover {';
        echo 'text-decoration: none;';
        echo 'border: #eee 1px solid;';
        echo 'box-shadow: 0 3px 8px 0 #ddd;';
        echo 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'%23333\' d=\'M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\'/%3e%3c/svg%3e");';
        echo '}';


        echo '#' . $this->id . ' .header-desktop-toolbars {';
        echo 'flex: 0 1 auto;';
        echo 'display: flex;';
        echo 'justify-content: flex-end;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar {';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar a {';
        echo 'display: block;';
        echo 'color: #fff;';
        echo 'text-align: center;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar a:hover {';
        echo 'text-decoration: none;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar-wishlists, ';
        echo '#' . $this->id . ' .header-desktop-toolbar-user {';
        echo 'margin-right: 2rem;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar-wishlists span, ';
        echo '#' . $this->id . ' .header-desktop-toolbar-user span {';
        echo 'display: block;';
        echo 'font-size: 14px;';
        echo 'margin-top: 4px;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar-wishlists .header-icon-wishlist, ';
        echo '#' . $this->id . ' .header-desktop-toolbar-user .header-icon-user {';
        echo 'width: 30px;';
        echo 'height: 28px;';
        echo 'background-size: 30px 28px;';
        echo 'margin-top: 3px;';
        echo '}';

        if (isset($this->hideHeaderCart) && $this->hideHeaderCart) {
            echo '#' . $this->id . ' .header-desktop-toolbar-cart {';
            echo 'display: none;';
            echo '}';
        }

        echo '#' . $this->id . ' .header-desktop-toolbar-cart a {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar-cart .header-icon-cart {';
        echo 'width: 52px;';
        echo 'height: 52px;';
        echo 'background-size: 52px 52px;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-toolbar-cart .header-toolbar-cart-counter {';
        echo 'position: absolute;';
        echo 'top: -4px;';
        echo 'right: -4px;';
        echo 'min-width: 24px;';
        echo 'height: 24px;';
        echo 'line-height: 24px;';
        echo 'border-radius: 50%;';
        echo 'font-size: 12px;';
        echo 'background-color: #fff;';
        echo 'color: var(--main-color);';
        echo 'text-align: center;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu {';
        echo 'background-color: #fff;';
        echo 'height: 2.75rem;';
        echo 'line-height: 2.75rem;';
        echo 'position: relative;';
        //echo 'border-bottom: #ddd 1px solid;';
        echo 'box-shadow: 0 3px 5px 0 #eee;';
        echo 'z-index: 100;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu-lv1-item,';
        echo '#' . $this->id . ' .header-desktop-menu-lv1-item-with-dropdown {';
        echo 'display: inline-block;';
        echo 'padding: 0;';
        echo 'margin: 0 2rem 0 0;';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu-lv1-item-active > a {';
        echo 'color: var(--main-color);';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu-lv1-item-with-dropdown:after {';
        echo 'display: inline-block;';
        echo 'margin-left: .35em;';
        echo 'vertical-align: middle;';
        echo 'content: "";';
        echo 'border-top: .3em solid #999;';
        echo 'border-left: .3em solid transparent;';
        echo 'border-right: .3em solid transparent;';
        echo 'border-bottom: 0;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu-lv2 {';
        echo 'position: absolute;';
        echo 'left: -.5rem;';
        echo 'background-color: #fff;';
        echo 'min-width: 170px;';
        echo 'box-shadow: 0 0 2px 1px #eee;';
        echo 'z-index: 120;';
        echo 'transition: transform 0.3s linear;';
        echo 'transform: translateY(30px);';
        echo 'visibility: hidden;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu-lv1-item-with-dropdown:hover .header-desktop-menu-lv2 {';
        echo 'visibility: visible;';
        echo 'transform: translateY(-1px)';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu-lv2-item {';
        echo 'padding: .2rem 2rem;';
        echo '}';

        echo '#' . $this->id . ' .header-desktop-menu-lv2-item-active, ';
        echo '#' . $this->id . ' .header-desktop-menu-lv2-item:hover  {';
        echo 'background-color: #f1f1f1;';
        echo '}';

        echo '}';
        echo '</style>';
    }

    public function js()
    {
        echo '<script>';
        echo '$(function () {';

        echo '$("#header-desktop-search-form-input").focus(function () {';
        echo '$("html").addClass("js-open-layer").addClass("js-open-layer-header-desktop-search");';
        echo '});';
        
        echo '$("#header-desktop-search-keywords-close").click(function (e) {';
        echo '$("html").removeClass("js-open-layer").removeClass("js-open-layer-header-desktop-search");';
        echo '});';

        echo '})';
        echo '</script>';
    }

    public function display()
    {
        if ($this->config->enable) {
            $this->css();
            $this->js();

            $beUrl = beUrl();
            $configStore = Be::getConfig('App.ShopFai.Store');

            echo '<div class="header">';

            echo '<div class="header-mobile">';
            echo '<div class="be-container">';
            echo '<div class="header-mobile-row">';

            echo '<div class="header-mobile-left-toolbars">';
            echo '<div class="header-mobile-left-toolbar header-mobile-left-toolbar-menu">';
            echo '<a href="javascript:void(0);" onclick="return DrawerMenu.toggle();"><i class="header-icon header-icon-menu"></i></a>';
            echo '</div>';
            echo '<div class="header-mobile-left-toolbar header-mobile-left-toolbar-search">';
            echo '<a href="javascript:void(0);" onclick="return DrawerSearch.toggle();"><i class="header-icon header-icon-search"></i></a>';
            echo '</div>';
            echo '</div>';

            echo '<div class="header-mobile-logo">';
            echo '<a href="' . $beUrl . '">';
            if ($this->config->logoType == 'text') {
                if ($this->config->logoText) {
                    echo $this->config->logoText;
                } else {
                    echo $configStore->name;
                }
            } else {
                echo '<img src="' . $this->config->logoImage . '">';
            }
            echo '</a>';
            echo '</div>';

            echo '<div class="header-mobile-right-toolbars">';
            echo '<div class="header-mobile-right-toolbar header-mobile-right-toolbar-user">';
            echo '<a href="javascript:void(0);" onclick="return DrawerUser.toggle();">';
            echo '<i class="header-icon header-icon-user"></i>';
            echo '</a>';
            echo '</div>';
            echo '<div class="header-mobile-right-toolbar header-mobile-right-toolbar-cart">';
            echo '<a href="javascript:void(0);" onclick="return DrawerCart.toggle();">';
            echo '<i class="header-icon header-icon-cart"></i>';
            echo '<span class="header-toolbar-cart-counter">0</span>';
            echo '</a>';
            echo '</div>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="header-desktop">';

            echo '<div class="header-desktop-top">';
            echo '<div class="be-container">';
            echo '<div class="header-desktop-row">';

            echo '<div class="header-desktop-logo">';
            echo '<a href="' . $beUrl . '">';
            if ($this->config->logoType == 'text') {
                if ($this->config->logoText) {
                    echo $this->config->logoText;
                } else {
                    echo $configStore->name;
                }
            } else {
                echo '<img src="' . $this->config->logoImage . '">';
            }
            echo '</a>';
            echo '</div>';

            echo '<div class="header-desktop-search">';
            echo '<form class="header-desktop-search-form" method="get" action="' . beUrl('ShopFai.Product.search') . '">';
            echo '<input type="hidden" name="route" value="ShopFai.Product.search">';
            echo '<input class="header-desktop-search-form-input" id="header-desktop-search-form-input" type="text" placeholder="Search the store" autocomplete="off" name="q" value="' . Be::getRequest()->get('q', '') . '">';
            echo '<button class="header-desktop-search-form-submit" type="submit">';
            echo '<svg viewBox="0 0 512 512">';
            echo '<path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5 S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9 C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"></path>';
            echo '</svg>';
            echo '</button>';
            echo '</form>';
            $hotKeywords = \Be\Be::getService('App.ShopFai.Product')->getTopSearchKeywords(12);
            if (count($hotKeywords) > 0) {
                echo '<div class="header-desktop-search-keywords">';
                echo '<div class="be-container be-p-relative">';
                echo '<div class="header-desktop-search-keywords-close" id="header-desktop-search-keywords-close"></div>';
                echo '<div class="be-fs-125 be-fw-bold be-lh-125 be-mb-100">Top Searches</div>';
                foreach ($hotKeywords as $hotKeyword) {
                    if (!$hotKeyword) continue;
                    echo '<a class="header-desktop-search-keyword" href="' . beUrl('ShopFai.Product.search', ['q' => $hotKeyword]) . '">';
                    echo $hotKeyword;
                    echo '</a>';
                }
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';

            echo '<div class="header-desktop-toolbars">';
            echo '<div class="header-desktop-toolbar header-desktop-toolbar-wishlists">';
            echo '<a href="' . beUrl('ShopFai.UserFavorite.favorites') . '">';
            echo '<i class="header-icon header-icon-wishlist"></i>';
            echo '<span>Wish List</span>';
            echo '</a>';
            echo '</div>';
            echo '<div class="header-desktop-toolbar header-desktop-toolbar-user">';
            echo '<a href="javascript:void(0);" onclick="return DrawerUser.toggle();">';
            echo '<i class="header-icon header-icon-user"></i>';
            echo '<span>' . (Be::getUser()->isGuest() ? 'Sign In' : 'Dashboard') . '</span>';
            echo '</a>';
            echo '</div>';
            echo '<div class="header-desktop-toolbar header-desktop-toolbar-cart">';
            echo '<a href="javascript:void(0);" onclick="return DrawerCart.toggle();">';
            echo '<i class="header-icon header-icon-cart"></i>';
            echo '<span class="header-toolbar-cart-counter">0</span>';
            echo '</a>';
            echo '</div>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';


            echo '<div class="header-desktop-menu">';
            echo '<div class="be-container">';
            echo '<ul class="header-desktop-menu-lv1">';
            $menu = \Be\Be::getMenu('North');
            $menuTree = $menu->getTree();
            $menuActiveId = $menu->getActiveId();
            foreach ($menuTree as $item) {
                $hasSubItem = false;
                if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                    $hasSubItem = true;
                }

                $active = false;
                if ($hasSubItem) {
                    foreach ($item->subItems as &$subItem) {
                        if ($item->id === $menuActiveId) {
                            $subItem->active = true;
                            $active = true;
                            break;
                        }
                    }
                    unset($subItem);
                } else {
                    if ($item->id === $menuActiveId) {
                        $active = true;
                    }
                }

                echo '<li class="header-desktop-menu-lv1-item';

                if ($hasSubItem) {
                    echo '-with-dropdown';
                }

                if ($active) {
                    echo ' header-desktop-menu-lv1-item-active';
                }
                echo '">';

                $url = 'javascript:void(0);';
                if ($item->route) {
                    if ($item->params) {
                        $url = beUrl($item->route, $item->params);
                    } else {
                        $url = beUrl($item->route);
                    }
                } else {
                    if ($item->url) {
                        if ($item->url === '/') {
                            $url = beUrl();
                        } else {
                            $url = $item->url;
                        }
                    }
                }

                echo '<a class="link-hover" href="' . $url . '"';
                if ($item->target === '_blank') {
                    echo 'target="_blank"';
                }
                echo '>' . $item->label . '</a>';

                if ($hasSubItem) {
                    echo '<ul class="header-desktop-menu-lv2">';
                    foreach ($item->subItems as $subItem) {
                        echo '<li class="header-desktop-menu-lv2-item';
                        if (isset($subItem->active) && $subItem->active) {
                            echo 'header-desktop-menu-lv2-item-active';
                        }
                        echo '">';

                        $url = 'javascript:void(0);';
                        if ($subItem->route) {
                            if ($subItem->params) {
                                $url = beUrl($subItem->route, $subItem->params);
                            } else {
                                $url = beUrl($subItem->route);
                            }
                        } else {
                            if ($subItem->url) {
                                $url = $subItem->url;
                            }
                        }

                        echo '<a class="link-hover" href="' . $url . '"';
                        if ($subItem->target === '_blank') {
                            echo 'target="_blank"';
                        }
                        echo '>' . $subItem->label . '</a>';

                        echo '</li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';

            echo '</div>';
        }
    }

}
