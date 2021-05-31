@php

$featuredCats = App\Category::where('featured' , true)->orderBy('order')->get();

@endphp

<div class="main-navbar">
    <div class="container">
        <div class="wrapper">
            <div class="left-wrapper">
                <nav class="nav ">
                    <div class="mobile-close" @click.prevent="toggleNav()">
                        <i class="fas fa-times"></i>
                    </div>
                    <ul class="nav__list">
                        <li class="nav__item home">
                            <a
                                href="/"
                                class="nav__item--link"
                            >
                                الرئيسية
                            </a>
                        </li>
                        <li class="nav__item about">
                            <a
                                href="/about"
                                class="nav__item--link"
                            >
                                من نحن
                            </a>
                        </li>
                        {{-- remember to put has-dropdown class to enable icon --}}
                        @foreach($featuredCats as $cat)
                        <li class="nav__item">
                            <a
                        href="{{route('posts' , ['category' => $cat->slug])}}"
                                class="nav__item--link "
                            >
                                {{$cat->name}}
                            </a>
                        </li>
                        @endforeach
                        <li class="nav__item">
                            <a
                                href="/videos"
                                class="nav__item--link"
                            >
                                فيديوهات
                            </a>
                        </li>
                        <li class="nav__item articles">
                            <a
                                href="/articles"
                                class="nav__item--link"
                            >
                                المقالات
                            </a>
                        </li>
                        <li class="nav__item posts">
                            <a
                                href="/posts"
                                class="nav__item--link"
                            >
                                الموضوعات
                            </a>
                        </li>
                        <li class="nav__item contact">
                            <a
                                href="/contact"
                                class="nav__item--link"
                            >
                                اتصل بنا
                            </a>
                        </li>
                    </ul>

                    <div class="mobile-contacts">
                        <div class="info">
                        <div class="info__header">
                            <h5>العنوان</h5>
                        </div>
                        <div class="info__content">
                            <address class="address">
                            <p>
                                {{App\StaticHtml::where('key' , 'address')->first()->value}}
                            </p>
                            </address>
                        </div>
                        <div class="info__header">
                            <h5>اتصل بنا</h5>
                        </div>
                        <div class="info__content contacts">
                            <div>
                            <a
                                class="tel"
                                href="tel:{{App\StaticHtml::where('key' , 'phone')->first()->value}}"
                            ><i class="fas fa-phone"></i>{{App\StaticHtml::where('key' , 'phone')->first()->value}}
                            </a>
                            </div>
                            <div>
                            <a
                                class="tel"
                                href="tel:{{App\StaticHtml::where('key' , 'land_phone')->first()->value}}"
                            ><i class="fas fa-fax"></i>{{App\StaticHtml::where('key' , 'land_phone')->first()->value}}
                            </a>
                            </div>
                            <div>
                            <a
                                class="tel"
                                href="mailto:{{App\StaticHtml::where('key' , 'email')->first()->value}}"
                            ><i class="fas fa-envelope"></i>{{App\StaticHtml::where('key' , 'email')->first()->value}}
                            </a>
                            </div>
                        </div>
                        <div class="icons">
                            <div class="icons__header">
                            <h5>روابط التواصل الاجتماعي</h5>
                            </div>
                            <ul>
                                <li><a
                                    target="_blank"
                                    href="{{App\StaticHtml::where('key' , 'facebook')->first()->value}}"
                                    ><i class="fab fa-facebook-f"></i></a></li>
                                <li><a
                                    target="_blank"
                                    href="{{App\StaticHtml::where('key' , 'twitter')->first()->value}}"
                                    ><i class="fab fa-twitter"></i></a></li>
                                <li><a
                                    target="_blank"
                                    href="{{App\StaticHtml::where('key' , 'linkedin')->first()->value}}"
                                    ><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a
                                    target="_blank"
                                    href="{{App\StaticHtml::where('key' , 'youtube')->first()->value}}"
                                    ><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="icons">

                <a
                href="#"
                class="menue-toggler"
                @click.prevent="toggleNav()"
                >

                <span></span>
                <span></span>
                <span></span>
                </a>
            </div>
        </div>
    </div>

</div>