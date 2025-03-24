<!DOCTYPE html>
<html lang="vi" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta property="og:image" content="{{ asset($weddingCard->banner_preview) }}">

    <!-- Search Engine Optimization by Rank Math - https://rankmath.com/ -->
    <title>{{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Thiệp cưới online</title>
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="article">
    <meta property="og:title"
        content="{{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Thiệp cưới online">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Thiệp cưới online">
    <meta property="og:updated_time" content="2024-04-03T04:59:39+00:00">
    <meta property="og:image" content="{{ asset($weddingCard->banner_preview) }}">
    <meta property="og:image:secure_url" content="{{ asset($weddingCard->banner_preview) }}">
    <meta property="og:image:width" content="960">
    <meta property="og:image:height" content="1351">
    <meta property="og:image:alt"
        content="{{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Thiệp cưới online">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="{{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Thiệp cưới online">
    <meta name="twitter:image" content="{{ asset($weddingCard->banner_preview) }}">
    <!-- /Rank Math WordPress SEO plugin -->

    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//unpkg.com">

    <script>
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/",
            "ext": ".png') }}",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/thiepdientu.com.vn\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.6.1"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e,
                        timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                    r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e
                        .getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !
                            n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e,
                                "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                                "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
                                );
                    case "emoji":
                        return !n(e, "\ud83d\udc26\u200d\u2b1b", "\ud83d\udc26\u200b\u2b1b")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(
                        300, 150) : i.createElement("canvas"),
                    a = r.getContext("2d", {
                        willReadFrequently: !0
                    }),
                    o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() <
                            e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" !=
                        typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p
                                .toString()
                            ].join(",") + "));",
                            r = new Blob([e], {
                                type: "text/javascript"
                            }),
                            a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n
                    .supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports
                        .everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n
                    .DOMReady = !1, n.readyCallback = function() {
                        n.DOMReady = !0
                    }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e
                    .concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
    </script>
    <style id="wp-emoji-styles-inline-css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel="stylesheet" id="wp-block-library-css" href="{{ asset('template06/css/style.min.css') }}" media="all">
    <style id="rank-math-toc-block-style-inline-css">
        .wp-block-rank-math-toc-block nav ol {
            counter-reset: item
        }

        .wp-block-rank-math-toc-block nav ol li {
            display: block
        }

        .wp-block-rank-math-toc-block nav ol li:before {
            content: counters(item, ".") ". ";
            counter-increment: item
        }
    </style>
    <style id="classic-theme-styles-inline-css">
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <style id="global-styles-inline-css">
        :root {
            --wp--preset--aspect-ratio--square: 1;
            --wp--preset--aspect-ratio--4-3: 4/3;
            --wp--preset--aspect-ratio--3-4: 3/4;
            --wp--preset--aspect-ratio--3-2: 3/2;
            --wp--preset--aspect-ratio--2-3: 2/3;
            --wp--preset--aspect-ratio--16-9: 16/9;
            --wp--preset--aspect-ratio--9-16: 9/16;
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        .is-layout-flex> :is(*, div) {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        .is-layout-grid> :is(*, div) {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :root :where(.wp-block-pullquote) {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel="stylesheet" id="uikit-css" href="{{ asset('template06/css/uikit.min.css') }}" media="all">
    <link rel="stylesheet" id="reset uikit-css" href="{{ asset('template06/css/reset1.css') }}" media="all">
    <link rel="stylesheet" id="remixicon-css" href="{{ asset('template06/css/remixicon.css') }}" media="all">
    <link rel="stylesheet" id="preload-css" href="{{ asset('template06/css/preload.css') }}" media="all">
    <link rel="stylesheet" id="wedding reset-css" href="{{ asset('template06/css/reset-wedding.css') }}"
        media="all">
    <link rel="stylesheet" id="fancybox-css" href="{{ asset('template06/css/fancybox.css') }}" media="all">
    <link rel="stylesheet" id="swiper slide-css" href="{{ asset('template06/css/swiper-bundle.min.css') }}"
        media="all">
    <link rel="stylesheet" id="animation-css" href="{{ asset('template06/css/animation.css') }}" media="all">
    <link rel="stylesheet" id="aos style-css" href="{{ asset('template06/css/aos.css') }}" media="all">
    <link rel="stylesheet" id="footer style-css" href="{{ asset('template06/css/footer.css') }}" media="all">
    <link rel="stylesheet" id="wedding style-css" href="{{ asset('template06/css/wedding.css') }}" media="all">
    <link rel="stylesheet" id="theme-css" href="{{ asset('template06/css/theme.css') }}" media="all">
    <script src="{{ asset('template06/js/jquery.min_1.js') }}" id="jquery-core-js"></script>
    <script src="{{ asset('template06/js/jquery-migrate.min.js') }}" id="jquery-migrate-js"></script>
    <script src="{{ asset('template06/js/jquery.min.js') }}" id="Jquery-js"></script>
    <link rel="https://api.w.org/" href="https://thiepdientu.com.vn/wp-json/">
    <link rel="alternate" title="JSON" type="application/json"
        href="https://thiepdientu.com.vn/wp-json/wp/v2/mau-thiep/1138">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://thiepdientu.com.vn/xmlrpc.php?rsd">
    <meta name="generator" content="WordPress 6.6.1">
    <link rel="shortlink" href="https://thiepdientu.com.vn/?p=1138">
    <link rel="alternate" title="oNhúng (JSON)" type="application/json+oembed"
        href="https://thiepdientu.com.vn/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fthiepdientu.com.vn%2Fmau-thiep%2F1138%2F">
    <link rel="alternate" title="oNhúng (XML)" type="text/xml+oembed"
        href="https://thiepdientu.com.vn/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fthiepdientu.com.vn%2Fmau-thiep%2F1138%2F&amp;format=xml">
    <style type="text/css">
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }

        .banner-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('template06/css/style.css') }}">
    <script src="{{ asset('template06/js/wp-emoji-release.min.js') }}" defer=""></script>
</head>

<body
    class="mau-thiep-template mau-thiep-template-templates mau-thiep-template-xanhla mau-thiep-template-templatesxanhla-php single single-mau-thiep postid-1138 no-sidebar">

    <!-- PRELOAD -->
    <div id="preloader" class="uk-position-fixed uk-background-muted uk-position-z-index"
        style=" left: 0; bottom:0; top:0; width: 100%; z-index:99999;">

        <div class="uk-position-center uk-text-center">

            <h2 class="uk-text-center uk-marign-remove uk-text-bold uk-h4  uk-animation-slide-bottom">
                {{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Thiệp cưới online</h2>

        </div>

    </div>
    <!-- END PRELOAD --> <!-- BANNER -->
    <section id="banner" class="section-banner"
        style="color:rgb(0, 0, 0);  object-fit: cover;
    object-position: center;">
        <img src="{{ asset('template06/images/bg3.jpg') }}"
            alt="" class="banner-bg" style="object-position:center center; ">
        <div style="padding: 0px 43px;" class="banner-container container">
            
            <div data-aos="fade-up" data-aos-duration="3000"
                class="banner-name uk-position-relative uk-position-z-index">
                {{ $weddingCard->groom_name }}<br>
                &amp;<br>
                {{ $weddingCard->bride_name }} </div>
            <div>
                {{-- <p>Vào Lúc</p>
                <p class="banner-time">{{ $weddingCard->wedding_time }}</p> --}}
            </div>
            <div class="banner-date">
                <span class="day_name">@php
                    \Carbon\Carbon::setLocale('vi'); // Đặt ngôn ngữ tiếng Việt
                    $date = \Carbon\Carbon::parse($weddingCard->wedding_date);
                    $weekdayBride = ucwords($date->translatedFormat('l')); // Viết hoa chữ cái đầu của mỗi từ // Viết hoa chữ cái đầu // Lấy thứ tiếng Việt
                @endphp
                    {{ $weekdayBride }}</span>
                <span>|</span>
                <span class="banner_date">{{ \Carbon\Carbon::parse($weddingCard->wedding_date)->day }}</span>
                <span>/</span>
                <span class="banner_date">{{ \Carbon\Carbon::parse($weddingCard->wedding_date)->month }}</span>
            </div>
            <div class="banner-address uk-position-relative uk-position-z-index">
                <p>{{ $weddingCard->wedding_message }}</p>
                <p class="address-name">{{ $weddingCard->name_place_wedding }}</p>
                <address>{{ $weddingCard->address_wedding }}</address>
            </div>
            <div class="social-link">
                <a href="tel:+84{{ $weddingCard->groom_phone }}" class="">
                    <i class="ri-phone-fill"></i>
                </a>
                <a href="{{ $weddingCard->address_wedding_map }}">
                    <i class="ri-map-fill"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- END BANNER -->


    <!-- ABOUT -->
    <section id="about" class="section-about">
        <div class="section-heading">
            <h2 class="section-title" style="color:#587C4C">CHÚ RỂ VÀ CÔ DÂU</h2>
        </div>
        <div class="about-container container">
            <div class="about-card" style="order:1">
                <div class="about-media" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset($weddingCard->bride_avatar) }}" alt="" class="bride_img">
                </div>
                <div class="about-data uk-text-left" data-aos="fade-down" data-aos-duration="1000">

                    <h3 class="bride_name">{{ $weddingCard->bride_name }}</h3>

                    <p class="bride_des">{{ $weddingCard->des_bride }}</p>
                    <hr>
                </div>

            </div>
            <div class="about-card" style="order:1">
                <div class="about-media" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset($weddingCard->groom_avatar) }}" alt="" class="groom_img">
                </div>
                <div class="about-data uk-text-right" data-aos="fade-down" data-aos-duration="1000">

                    <h3 class="groom_name">{{ $weddingCard->groom_name }}</h3>

                    <p class="groom_des">{{ $weddingCard->des_groom }}</p>
                    <hr>
                </div>

            </div>
        </div>
    </section>
    <!-- END ABOUT -->
    <!-- TIMELINE -->
    @php
        $album = !empty($weddingCard->album) ? json_decode($weddingCard->album, true) : [];
        $stories = [];
        if ($weddingCard->love_story != ',') {
            $test = '1/2/2023:Hẹn Hò,1/3/2025:Tỏ tình,2/04/2025:Đính Hôn, 2/05/2025:Kết Hôn';
            $items = explode(',', $weddingCard->love_story);
            foreach ($items as $item) {
                [$date, $story] = explode(':', $item);
                $image = !empty($album) ? array_shift($album) : null; // Lấy ảnh đầu tiên và loại khỏi album
                $stories[] = ['date' => trim($date), 'story' => trim($story), 'image' => $image];
            }
        }

    @endphp

    @if (!empty($stories))

        <section id="time-line" class="time-line-section img_bg bg_overlay"
            style="background-image:url({{ asset($weddingCard->banner_love_story) }})">

            <div class="time-line container">

                <div class="section-heading">

                    <p class="subtitle"></p>

                    <h2 class="section-title">

                        Love Story
                    </h2>


                </div>



                <div class="timeline-list">
                    @foreach ($stories as $story)
                        <div class="timeline-item" data-aos="fade-up" data-aos-duration="1000">

                            <div class="timeline-media">

                                <img src="{{ asset($story['image']) }}" alt="" class="timline-img">

                            </div>

                            <div class="timeline-body">

                                <span class="story-date">{{ $story['date'] }}</span>

                                <span class="title">{{ $story['story'] }}</span>

                                <p class="timeline-des uk-margin-remove"></p>

                            </div>

                        </div>

                    @endforeach


                </div>

            </div>

        </section>

        <!-- END TIMELINE -->

    @endif



    <!-- ALBUM -->
    <section id="album" class="uk-section" data-aos="fade-up" data-aos-duration="3000">
        <div class="section-heading">
            <p class="subtitle"></p>
            <h2 style="color:#587C4C" class="uk-heading-small uk-text-center script-font">
                Album Ảnh </h2>
        </div>
        @php
            $album = !empty($weddingCard->album) ? json_decode($weddingCard->album, true) : [];
        @endphp
        <div class="album container">
          @if (!empty($album))
                @foreach (json_decode($weddingCard->album, true) as $image)
            
                    <div class="album-item">
                      <a data-fancybox="gallery"
                          href="{{ asset($image) }}">
                          <img src="{{ asset($image) }}"
                              alt="">
                      </a>
                  </div>
                @endforeach
            @endif

        </div>
    </section>
    <!-- END ALBUM -->
    <!-- VIDEO -->
    <style>
        #video {
            padding: 80px 0;
            background: var(--bg)
        }

        #video .section-title {
            text-align: center;
            color: var(--primary-color)
        }

        #video .subtitle {
            text-align: center;
        }

        .video-container {
            margin-top: 40px
        }

        .video-list {
            display: flex;
            flex-direction: column;
            gap: 40px;
            justify-content: center;
            align-items: center;
        }

        .video-list iframe {
            aspect-ratio: 16/9;
            width: 100%;
            max-width: 768px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0 0 0 /10%);
        }
    </style>
    <!-- END VIDEO -->

    <!-- COUNT DOWN -->

    <section data-aos="fade" data-aos-duration="3000" id="countdown-secton"
        class="uk-background-cover uk-section uk-section-large uk-text-center uk-light"
        style="background-image:url({{ asset($weddingCard->banner_coundown) }})">
        <div class="uk-container">

            <h2 class="uk-heading-small uk-text-center script-font">
                Cùng đếm ngược thời gian </h2>
            <svg class="heartbeat" width="64" height="64" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="#ed444f"
                    d="M16.5 13.287c-2.475-2.716-5.5-.712-5.5 2.112c0 2.56 1.814 4.035 3.358 5.292l.044.036l.427.35c.571.475 1.121.923 1.671.923s1.1-.448 1.671-.923C19.789 19.73 22 18.224 22 15.399c0-.927-.326-1.767-.853-2.38c-1.075-1.251-2.985-1.556-4.647.268Z">
                </path>
                <path fill="#f1ebe4"
                    d="M8.106 18.247C5.298 16.083 2 13.542 2 9.137C2 4.274 7.5.825 12 5.501C16.5.825 22 4.274 22 9.137c0 .834-.118 1.6-.329 2.31a4.203 4.203 0 0 0-2.619-.947c-.89-.005-1.758.274-2.553.81c-1.39-.933-2.956-1.058-4.33-.395c-1.635.79-2.669 2.556-2.669 4.484c0 2.306 1.149 3.923 2.342 5.095c-.948-.076-1.897-.808-2.88-1.583c-.277-.219-.564-.44-.856-.664Z">
                </path>
            </svg>
            <div class="uk-grid-small uk-child-width-1-4 uk-flex-center uk-margin-large-top" uk-grid=""
                uk-countdown="date: {{ $weddingCard->date_coundown }}">
                <div>
                    <div
                        class="uk-countdown-number uk-countdown-days uk-padding-small uk-flex uk-flex-center uk-flex-middle blur-bg uk-border-rounded text-white">
                    </div>
                    <div class="uk-countdown-label uk-margin-small uk-text-center ">Ngày</div>
                </div>

                <div>
                    <div
                        class="uk-countdown-number uk-countdown-hours uk-padding-small uk-flex uk-flex-center uk-flex-middle blur-bg uk-border-rounded text-white">
                    </div>
                    <div class="uk-countdown-label uk-margin-small uk-text-center ">Giờ</div>
                </div>

                <div>
                    <div
                        class="uk-countdown-number uk-countdown-minutes uk-padding-small uk-flex uk-flex-center uk-flex-middle blur-bg uk-border-rounded text-white">
                    </div>
                    <div class="uk-countdown-label uk-margin-small uk-text-center ">Phút</div>
                </div>

                <div>
                    <div
                        class="uk-countdown-number uk-countdown-seconds uk-padding-small uk-flex uk-flex-center uk-flex-middle blur-bg uk-border-rounded text-white">
                    </div>
                    <div class="uk-countdown-label uk-margin-small uk-text-center ">Giây</div>
                </div>
            </div>

        </div>
    </section>

    <!-- END COUNT DOWN -->

    <!-- INVITATION -->
    <section id="invitation" class="section-invitation">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title">
                    <p style="color:#587C4C" class="main-font">{{ $weddingCard->message_invite }}</p>
                </h2>
            </div>
            <div class="invitation">
                <div class="invitation-container">
                    <div class="invitation-card"> <img
                            src="{{ asset($weddingCard->bride_avatar) }}"
                            alt="">
                        <h3 class="card-title uk-margin-remove uk-text-bold">{{ $weddingCard->bride_eating_title }}</h3>
                        <address class="uk-margin-remove">
                            <p>{{ $weddingCard->address_bride }}</p>
                        </address>
                        <div class="invitation-body">
                            <div class="invi_time">
                                <p class="fw-bold">Vào lúc
                                    <span class="uk-text-bold invi_hours">
                                        {{ $weddingCard->time_bride }} </span>
                                </p>
                                <div class="invi_group_time">

                                    <span class="invi_date_text">
                                        @php
                                            \Carbon\Carbon::setLocale('vi'); // Đặt ngôn ngữ tiếng Việt
                                            $date = \Carbon\Carbon::parse($weddingCard->bride_eating_date);
                                            $weekdayBride = ucwords($date->translatedFormat('l')); // Viết hoa chữ cái đầu của mỗi từ // Viết hoa chữ cái đầu // Lấy thứ tiếng Việt
                                        @endphp
                                        {{ $weekdayBride }} </span>
                                    <span class="invi_date_number">
                                        <p class="invi_date">{{ \Carbon\Carbon::parse($weddingCard->bride_eating_date)->day }}</p> /
                                        <p class="invi_month">{{ \Carbon\Carbon::parse($weddingCard->bride_eating_date)->month }}</p>
                                    </span>
                                    <span class="invi_year_text">
                                        {{ \Carbon\Carbon::parse($weddingCard->bride_eating_date)->year }} </span>
                                </div>

                                <p class="invi_amlich">{{ $weddingCard->time_bride_al }}</p>
                            </div>

                        </div>
                        <div class="social-link">
                            <a href="tel:(+84){{ $weddingCard->bride_phone }}" class="phone_number">
                                <i class="ri-phone-fill"></i>
                            </a>

                            <a href="{{ $weddingCard->bride_map }}" class="invi_map" target="_blank">
                                <i class="ri-map-2-fill"></i>
                            </a>
                        </div>


                    </div>
                    <div class="invitation-card"> <img
                            src="{{ asset($weddingCard->groom_avatar) }}"
                            alt="">
                        <h3 class="card-title uk-margin-remove uk-text-bold">{{ $weddingCard->groom_eating_title }}</h3>
                        <address class="uk-margin-remove">
                            <p>{{ $weddingCard->address_groom }}</p>
                        </address>
                        <div class="invitation-body">
                            <div class="invi_time">
                                <p class="fw-bold">Vào lúc
                                    <span class="uk-text-bold invi_hours">
                                        {{ $weddingCard->time_groom }} </span>
                                </p>
                                <div class="invi_group_time">

                                    <span class="invi_date_text">
                                        @php
                                            \Carbon\Carbon::setLocale('vi'); // Đặt ngôn ngữ tiếng Việt
                                            $date = \Carbon\Carbon::parse($weddingCard->groom_eating_date);
                                            $weekdayGroom = ucwords($date->translatedFormat('l')); // Viết hoa chữ cái đầu của mỗi từ // Viết hoa chữ cái đầu // Lấy thứ tiếng Việt
                                        @endphp
                                        {{ $weekdayGroom }}  </span>
                                    <span class="invi_date_number">
                                        <p class="invi_date">{{ \Carbon\Carbon::parse($weddingCard->groom_eating_date)->day }}</p> /
                                        <p class="invi_month">{{ \Carbon\Carbon::parse($weddingCard->groom_eating_date)->month }}</p>
                                    </span>
                                    <span class="invi_year_text">
                                        {{ \Carbon\Carbon::parse($weddingCard->groom_eating_date)->year }} </span>
                                </div>

                                <p class="invi_amlich">{{ $weddingCard->time_groom_al }}</p>
                            </div>

                        </div>
                        <div class="social-link">
                            <a href="tel:(+84){{ $weddingCard->groom_phone }}" class="phone_number">
                                <i class="ri-phone-fill"></i>
                            </a>

                            <a href="{{ $weddingCard->groom_map }}" class="invi_map" target="_blank">
                                <i class="ri-map-2-fill"></i>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END INVITATION -->
    <!-- DRESS CODE -->
    <!-- END DRESS CODE -->
    <!-- LỜI CHÚC -->
    <!-- TIN NHẮN -->
    {{-- <section id="message" class="section-message uk-background-cover uk-section" style="background-image:url({{ asset('template06/images/232AA7D4-6D47-4C22-A97B-5BFD8613C2A6-e1705077838673.jpeg') }}); display:block">
	<div class="uk-position-cover uk-overlay uk-overlay-primary" style="opacity:.5"> </div>
      <div class="message-container container uk-position-relative uk-position-z-index">
        <h2 class="section-title uk-light" style="color:white">
          Gửi lời chúc đến cặp đôi        </h2>
        <div class="list_message">
          <!-- <div class="message-item" data-aos="fade-up" data-aos-duration="2000">
            <i class='bx bxs-quote-alt-left'></i>
            <h3 class="user_message">Phương Nguyễn</h3>
            <p class="message_body">Chúc bạn thân của tao lấy một chồng, đẻ hai con đủ nếp đủ tẻ, sống ở nhà ba tầng,
              mua xe 4 bánh nhé. Phải thật hạnh phúc mày nhé! Hi hi.</p>
          </div> -->
        </div>
       
        <div class="uk-padding-small uk-border-rounded blur-bg" style="border:1px solid white">
			
          <h3 class="form-title" style="color:white">Gửi lời chúc</h3>
          <form action="" id="messageForm" method="POST">
		
          <input type="hidden" id="postId" value="1138">
            <div class="input-group uk-margin-top" style="color:white">
              <label for="">
                Tên của bạn              </label>
              <input style="border:1px solid white" id="m_name" type="text" class="input blur-bg" value="" required="">
            </div>
            <div class="input-group uk-margin-top">
              <label for="" style="color:white">
                Lời nhắn gửi              </label>
              <textarea style="border:1px solid white; color:white" id="m_text" class="input-text text-white blur-bg" name="" cols="30" rows="5" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary send_message uk-margin-top" style="color:white">Gửi lời chúc</button>
          </form>
        </div>
      </div>
    </section> --}}
    <!-- END TIN NHẮN -->
    <script>
        fetch('/wp-json/wp/v2/comments?post=1138&per_page=100', {
                method: 'GET',
            })

            .then(response => response.json())
            .then(data => {
                mess_item = ''
                for (let i in data) {
                    if (!i) {
                        $('.list_message').attr('class', 'hidden')
                    }
                    c_author = data[i].author_name
                    c_content = data[i].content.rendered

                    mess_item +=
                        '<div class="blur-bg uk-padding-small uk-border-rounded uk-light"> <h3 class="user_message">' +
                        c_author + '</h3> <p class="message_body">' + c_content + '</p> </div>'
                }
                $('.list_message').html(mess_item)
            })

        //FORM
        $('#messageForm').submit(function(e) {
            e.preventDefault();
            const postId = $(this).find('#postId').val()
            const name = $(this).find('#m_name').val()
            const mess = $(this).find('#m_text').val()
            const data = JSON.stringify({
                post: postId,
                author_name: name,
                content: mess,
            });
            ACTION_URL = '/wp-json/wp/v2/comments'
            fetch(ACTION_URL, {
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: data,
                })
                .then((response) => {
                    if (response.ok === true) {
                        mess_new =
                            '<div class=" uk-light blur-bg uk-padding-small uk-border-rounded" data-aos="fade-up" data-aos-duration="2000"> <i class="bx bxs-quote-alt-left"></i> <h3 class="user_message">' +
                            name + '</h3> <p class="message_body">' + mess + '</p> </div>'
                        $('.list_message').prepend(mess_new)
                        $('#messageForm')[0].reset()
                    }
                    return response.json();
                })
                .then((object) => {
                    // Comment submission failed.
                    // Output `object.message` to see the error message.
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <!-- END LỜI CHÚC -->
    <!-- FORM XÁC NHẬN -->
    <!-- FROM XÁC NHẬN -->
    {{-- <section id="form" class="form" style="display:block">
  <div class="container">
    <form action="" method="post" id="form-wedding" style="background-image:url({{ asset('template06/images/paper-cut-sweet-pink-envelope-and-heart-with-copy-space-for-design-valentine-s-day-or-love-day-background-concept-send-a-letter-to-a-lover-couple-free-vector.jpg') }})">
      <h2 class="section-title">Xác nhận tham dự</h2>
      <p class="sub-title">Hãy cho chúng tôi biết bạn sẽ đến tham dự nhé!</p>
      <div class="form-container">
              <div class="group-radio">
        
          <label class="radio-container">TƯ GIA NHÀ GÁI            <span class="tooltip"> <p>ẤP TÂN PHÚ A, XÃ TÂN BÌNH, HUYỆN THANH BÌNH, TỈNH ĐỒNG THÁP</p>
 </span>
            <input type="radio" name="fav_language" id="nha_trai" value="TƯ GIA NHÀ GÁI">
            <span class="checkmark"></span>
          </label>
          
          <label class="radio-container">TƯ GIA NHÀ TRAI            <span class="tooltip"> <p>ẤP H�&nbsp;, XÃ TÂN BÌNH, HUYỆN THANH BÌNH, TỈNH ĐỒNG THÁP</p>
 </span>
            <input type="radio" name="fav_language" id="nha_trai" value="TƯ GIA NHÀ TRAI">
            <span class="checkmark"></span>
          </label>
                  </div>
                <div class="group-input">
          <label>Tên Khách Mời</label>
          <input type="text" class="input" id="f_name" required="" placeholder="Tên Khách Mời">
        </div>
        
        <div class="group-input">
          <p class="group-title"></p>
          <div class="group-select">
            <select name="" id="wedding-select" class="uk-text-truncate" style="max-width:320px">
              <option value="Có tôi sẽ đến">Có tôi sẽ đến </option>
              <option value="Xin Lỗi tôi không tham dự được !">Xin Lỗi tôi không tham dự được ! </option>
            </select>
            <i class="bx bx-chevron-down"></i>
          </div>
          <div class="group-select">
            <select name="" id="num_user">
              <option value="1 Người">1 Người </option>
              <option value="2 Người">2 Người</option>
              <option value="3 Người">3 Người</option>
            </select>
            <i class="bx bx-chevron-down"></i>
        </div>
        </div>
        <div class="group-input">
          <label></label>
          <textarea name="" id="f_text" cols="30" rows="4">          </textarea>
        </div>
        <div class="message-form">
          
        </div>
        <div class="group-input">
          <button type="submit" class="wedding-submit">Xác nhận</button>
        </div>
      </div>

    </form>
  </div>
</section>

<script>
  //XỬ LÝ FORM
$(document).ready(function(){
  $('.message-form').fadeOut(300)
  $('#form').on('submit', function(e){
      e.preventDefault();
      f_userName = "{{ $weddingCard->groom_name }}-{{ $weddingCard->bride_name }}"
      f_check = $('input[type="radio"]:checked').val()
      f_name = $(this).find('#f_name').val()
      f_numUser = $('#num_user').find('option:selected').val()
      f_select = $('#wedding-select').find('option:selected').val()
      f_text = $(this).find('#f_text').val()
      var form_data = {
          'entry.737056527': f_userName,
          'entry.642873731': f_check,
          'entry.1699210899': f_name,
          'entry.369695229': f_numUser,
          'entry.1528762541': f_select,
          'entry.1679764871': f_text,
      }
     $('.wedding-submit[type="submit"]').text('Đang gửi ...')
     $.ajax({
      url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSdD9g3WsFXklx1iJ2WTwnaKq7qXDh8fLcOetjSV8GMatzoWaA/formResponse",
      type: "POST",
      data : form_data,
      dataType: "xml",
      statusCode: {
          0: function() {
              mess_form = 'Chúng mình xin chân thành cám ơn !'
              $('.message-form').html(mess_form)
              $('button[type="submit"]').addClass('success')
              $('button[type="submit"]').removeClass('btn_primary')
              $('button[type="submit"]').attr('disabled','true')
              $('button[type="submit"]').text('Đã xác nhận')
              $('.message-form').fadeIn(300)
          },
          200: function() {
              alert('200')
          }
      }
      })
  })
  return false;
})
</script> --}}
    <!-- END FORM XÁC NHẬN -->

    <!-- GỬI QUÀ -->
    <section id="gift" class="section-gift" style="display:block">
        <div class="container">
            <p class="subtitle"></p>
            <h2 class="uk-heading-small uk-text-center  uk-text-cappercase"></h2>
            <a href="#box-gift" data-fancybox="" class="btn btn-primary ">
                <svg width="54" height="54" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                    <g fill="#fff">
                        <path d="M208 128v72a8 8 0 0 1-8 8H56a8 8 0 0 1-8-8v-72Z" opacity=".2"></path>
                        <path
                            d="M216 72h-35.08c.39-.33.79-.65 1.17-1A29.53 29.53 0 0 0 192 49.57A32.62 32.62 0 0 0 158.44 16A29.53 29.53 0 0 0 137 25.91a54.94 54.94 0 0 0-9 14.48a54.94 54.94 0 0 0-9-14.48A29.53 29.53 0 0 0 97.56 16A32.62 32.62 0 0 0 64 49.57A29.53 29.53 0 0 0 73.91 71c.38.33.78.65 1.17 1H40a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16v64a16 16 0 0 0 16 16h144a16 16 0 0 0 16-16v-64a16 16 0 0 0 16-16V88a16 16 0 0 0-16-16m-67-35.49a13.69 13.69 0 0 1 10-4.5h.49A16.62 16.62 0 0 1 176 49.08a13.69 13.69 0 0 1-4.5 10c-9.49 8.4-25.24 11.36-35 12.4c1.2-10.59 4.5-25.98 12.5-34.97m-64.09.36A16.63 16.63 0 0 1 96.59 32h.49a13.69 13.69 0 0 1 10 4.5c8.39 9.48 11.35 25.2 12.39 34.92c-9.72-1-25.44-4-34.92-12.39a13.69 13.69 0 0 1-4.5-10a16.6 16.6 0 0 1 4.82-12.16ZM40 88h80v32H40Zm16 48h64v64H56Zm144 64h-64v-64h64Zm16-80h-80V88h80z">
                        </path>
                    </g>
                </svg>
                <span style="color:white">{{ $weddingCard->message_gift }}</span>
            </a>
            <div id="box-gift">
                <div class="gift-container" id="gift-container">
                    <div class="gift-card">
                        <div class="gift-qr">
                            <img src="{{ asset($weddingCard->groom_qr) }}"
                                alt="" class="groom_qr" style="max-width:100%">
                                <img src="{{ asset($weddingCard->bride_qr) }}"
                                alt="" class="groom_qr" style="max-width:100%">
                        </div>
                        <div class="gift-body">
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </section>
    <!-- END GỬI QUÀ -->

    <!-- THANKYOU -->
    <!-- THANK YOU -->
    <section id="thankyou" class="section-thankyou bg_overlay uk-position-z-index">
        <div class="uk-overlay uk-overlay-primary uk-position-cover"> </div>
        <img src="{{ asset($weddingCard->banner_thanks) }}"
            alt="" class="thankyou-bg thankyou_img" style="object-position:">
        <div class="thankyou-body container uk-position-relative uk-position-z-index">
            <h2 class="script-font uk-heading-medium uk-text-center text-white" data-aos="fade-up"
                data-aos-duration="2000">Thank you!</h2>
            <p class="thankyou-des" data-aos="fade-down" data-aos-duration="2000">{{ $weddingCard->message_thanks }}</p>
            </p>
            </p>

        </div>
    </section>
    <!-- END THANK YOU --><!-- END THANKYOU -->
    <script>
        $(':root').css('--primary-color', '');
        $(':root').css('--secondary-color', '');
        $(':root').css('--bg', '');
    </script>
    <!-- AUDIO -->
    <audio src="{{ asset('template06/media/Shane-Filan-Beautiful-In-White-Official-Video.mp3') }}" controls="" autoplay=""
        id="audio">

    </audio>
    <!-- END AUDIO --> <!-- FOOTER -->
    <footer>
        <div class="footer-bottom">
            <p>Bản quyền 2025 thuộc về LS Wedding <a href="https://www.facebook.com/profile.php?id=61564156101208"
                    class="facebook">
                    <i class="ri-facebook-fill"></i>
                </a></p>
        </div>
    </footer>
    <button class="toggleAudio">
        <i class="ri-volume-mute-fill"></i>
    </button>
    <!-- END FOOTER -->

    <script src="{{ asset('template06/js/fancybox.umd.js') }}" id="fancybox js-js"></script>
    <script src="{{ asset('template06/js/uikit.min.js') }}" id="uikit js-js"></script>
    <script src="{{ asset('template06/js/uikit-icons.min.js') }}" id="uikit icon-js"></script>
    <script src="{{ asset('template06/js/preloader.js') }}" id="preloader js-js"></script>
    <script src="{{ asset('template06/js/aos.js') }}" id="aos js-js"></script>
    <script src="{{ asset('template06/js/swiper-bundle.min.js') }}" id="swiper slide-js"></script>
    <script src="{{ asset('template06/js/scrollreveal.min.js') }}" id="scrollrevea-js"></script>
    <script src="{{ asset('template06/js/main-wedding.js') }}" id="main wedding-js"></script>
    <script src="{{ asset('template06/js/comment-reply.min.js') }}" id="comment-reply-js" async=""
        data-wp-strategy="async"></script>






</body>

</html>
