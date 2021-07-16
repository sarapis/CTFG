<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

<style type="text/css">
*,::after,::before{box-sizing:border-box;}
ul{padding-left:2rem;}
ul{margin-top:0;margin-bottom:1rem;}
ul ul{margin-bottom:0;}
.small{font-size: .875em;}

a {
    text-decoration: none !important;
    color: inherit;
}

a:hover{color: #f91942 !important;}

::-moz-focus-inner{padding:0;border-style:none;}
.collapse:not(.show){display:none;}
.nav{display:flex;flex-wrap:wrap;padding-left:0;margin-bottom:0;list-style:none;}
.nav-link{display:block;padding:.5rem 1rem;text-decoration:none;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;}
@media (prefers-reduced-motion:reduce){
    .nav-link{transition:none;}
}
.card{position:relative;display:flex;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem;}
.flex-column{flex-direction:column!important;}
.mb-4{margin-bottom:1.5rem!important;}
.py-2{padding-top:.5rem!important;padding-bottom:.5rem!important;}
/*! CSS Used from: https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css */
[class*=" bi-"]::before{display:inline-block;font-family:bootstrap-icons!important;font-style:normal;font-weight:normal!important;font-variant:normal;text-transform:none;line-height:1;vertical-align:-.125em;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
.bi-caret-down-fill::before{content:"\f229";}
/*! CSS Used from: Embedded */
.sidebar li .submenu{list-style:none;margin:0;padding:0;padding-left:1rem;padding-right:1rem;}
.sidebar .nav-link{
    font-size: 15px;
    font-weight:500;
    font-family: raleway, helveticaneue, helvetica neue, Helvetica, Arial, sans-serif !important;
}
.sidebar .nav-link:hover{color:var(--bs-primary);}
/*! CSS Used fontfaces */
@font-face{font-family:"bootstrap-icons";src:url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/fonts/bootstrap-icons.woff2?8bd4575acf83c7696dc7a14a966660a3") format("woff2"), url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/fonts/bootstrap-icons.woff?8bd4575acf83c7696dc7a14a966660a3") format("woff");}
</style>

<nav class="sidebar card py-2 mb-4">
    <ul class="nav flex-column" id="nav_accordion">
        @foreach($ancestors as $ancestor)
            <li class="nav-item has-submenu">
                <a class="nav-link" href="/listing-category/{{ $ancestor->slug }}" title="{{ $ancestor->name }}">
                    <span class="text-sm cat-wrap <?php if(@$activeCat == $ancestor->name ) { echo 'text-white-600'; } ?>">
                        {{ $ancestor->name }}
                    </span>
                    <span class="text-sm" style="margin-top: -15px !important;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"  style="margin-top: -15px !important;">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>
                </a>
                <ul class="submenu collapse <?php if(@$activeAncestor == $ancestor->name ) { echo 'show'; } ?>">
                    @foreach($ancestor->grandParentCategories as $gpc)
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="/listing-category/{{ $gpc->slug }}" title="{{ $gpc->name }}">
                                <span class="text-sm cat-wrap <?php if(@$activeCat == $gpc->name ) { echo 'text-white-600'; } ?>">
                                    {{ $gpc->name }}
                                </span>
                                <span class="text-sm" style="margin-top: -15px !important;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"  style="margin-top: -15px !important;">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                            </a>
                            <ul class="submenu collapse <?php if(@$activeGrandParent == $gpc->name ) { echo 'show'; } ?>">
                                @foreach($gpc->parentCategories as $pc)
                                    <li class="nav-item has-submenu">
                                        <a class="nav-link" href="/listing-category/{{ $pc->slug }}" title="{{ $pc->name }}">
                                            <span class="text-sm cat-wrap <?php if(@$activeCat == $pc->name ) { echo 'text-white-600'; } ?>">
                                                {{ $pc->name }}
                                            </span>
                                            <span class="text-sm" style="margin-top: -15px !important;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16"  style="margin-top: -15px !important;">
                                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="submenu collapse <?php if(@$activeParent == $pc->name ) { echo 'show'; } ?>">
                                            @foreach($pc->categories as $cat)
                                                <li class="cat-dropdown <?php if(@$activeCat == $cat->name ) { echo 'active'; } ?>">
                                                    <a class="nav-link" href="/listing-category/{{ $cat->slug }}">
                                                        {{ $cat->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach


        @foreach($parentlessCategories as $plesscat)
            <li class="nav-item cat-dropdown-single <?php if(@$activeCat == $plesscat->name ) { echo 'active'; } ?>">
                <a class="nav-link" href="/listing-category/{{ $plesscat->slug }}">{{ $plesscat->name }} </a>
            </li>
        @endforeach
    </ul>
</nav>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
            element.addEventListener('mouseenter', function (e) {
                let nextEl = element.nextElementSibling;
                let parentEl  = element.parentElement;

                if(nextEl) {
                    e.preventDefault();
                    let mycollapse = new bootstrap.Collapse(nextEl);

                    if(nextEl.classList.contains('show')){
                        mycollapse.hide();
                    } else {
                        mycollapse.show();
                        var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');

                        if(opened_submenu){
                            new bootstrap.Collapse(opened_submenu);
                        }

                    }
                }

            });
        })

    });
</script>
