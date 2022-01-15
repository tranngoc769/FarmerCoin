<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon.png">
    <title>Tradio</title>
    <link href="/style/js/canvg.73cb7fda.js" rel="prefetch">
    <link href="/style/js/pdfmake.2a8bb910.js" rel="prefetch">
    <link href="/style/js/xlsx.113009c5.js" rel="prefetch">
    <link href="/style/css/app.d1f8523e.css" rel="preload" as="style">
    <link href="/style/css/chunk-vendors.d8f4d95f.css" rel="preload" as="style">
    <link href="/style/js/app.11c2ad85.js" rel="preload" as="script">
    <link href="/style/js/chunk-vendors.9035cacf.js" rel="preload" as="script">
    <link href="/style/css/chunk-vendors.d8f4d95f.css" rel="stylesheet">
    <link href="/style/css/app.d1f8523e.css" rel="stylesheet">
    <style type="text/css">
        .badge {
            color: #000;
            display: inline-block;
            padding: unset !important;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }
        
        .ntf {
            padding: 5px 0px !important;
            font-size: 12px;
        }
        
        .ntf-header {
            width: 100%;
            padding-bottom: 0px !important;
            margin-bottom: 0px !important;
        }
        
        .right {
            text-align: right;
        }
        
        .center {
            text-align: center;
        }
        
        .apexcharts-canvas {
            position: relative;
            user-select: none;
            /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
        }
        /* scrollbar is not visible by default for legend, hence forcing the visibility */
        
        .apexcharts-canvas ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px;
        }
        
        .apexcharts-canvas ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        }
        
        .apexcharts-inner {
            position: relative;
        }
        
        .apexcharts-text tspan {
            font-family: inherit;
        }
        
        .legend-mouseover-inactive {
            transition: 0.15s ease all;
            opacity: 0.20;
        }
        
        .apexcharts-series-collapsed {
            opacity: 0;
        }
        
        .apexcharts-tooltip {
            border-radius: 5px;
            box-shadow: 2px 2px 6px -4px #999;
            cursor: default;
            font-size: 14px;
            left: 62px;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            white-space: nowrap;
            z-index: 12;
            transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light {
            border: 1px solid #e3e3e3;
            background: rgba(255, 255, 255, 0.96);
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark {
            color: #fff;
            background: rgba(30, 30, 30, 0.8);
        }
        
        .apexcharts-tooltip * {
            font-family: inherit;
        }
        
        .apexcharts-tooltip-title {
            padding: 6px;
            font-size: 15px;
            margin-bottom: 4px;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
            background: #ECEFF1;
            border-bottom: 1px solid #ddd;
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
            background: rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid #333;
        }
        
        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            display: inline-block;
            font-weight: 600;
            margin-left: 5px;
        }
        
        .apexcharts-tooltip-text-z-label:empty,
        .apexcharts-tooltip-text-z-value:empty {
            display: none;
        }
        
        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            font-weight: 600;
        }
        
        .apexcharts-tooltip-marker {
            min-width: 12px;
            min-height: 12px;
            position: relative;
            top: 0px;
            margin-right: 10px;
            border-radius: 50%;
        }
        
        .apexcharts-tooltip-series-group {
            padding: 0 10px;
            display: none;
            text-align: left;
            justify-content: left;
            align-items: center;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
            opacity: 1;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active,
        .apexcharts-tooltip-series-group:last-child {
            padding-bottom: 4px;
        }
        
        .apexcharts-tooltip-series-group-hidden {
            opacity: 0;
            height: 0;
            line-height: 0;
            padding: 0 !important;
        }
        
        .apexcharts-tooltip-y-group {
            padding: 6px 0 5px;
        }
        
        .apexcharts-tooltip-box,
        .apexcharts-custom-tooltip {
            padding: 4px 8px;
        }
        
        .apexcharts-tooltip-boxPlot {
            display: flex;
            flex-direction: column-reverse;
        }
        
        .apexcharts-tooltip-box>div {
            margin: 4px 0;
        }
        
        .apexcharts-tooltip-box span.value {
            font-weight: bold;
        }
        
        .apexcharts-tooltip-rangebar {
            padding: 5px 8px;
        }
        
        .apexcharts-tooltip-rangebar .category {
            font-weight: 600;
            color: #777;
        }
        
        .apexcharts-tooltip-rangebar .series-name {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        .apexcharts-xaxistooltip {
            opacity: 0;
            padding: 9px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
            transition: 0.15s ease all;
        }
        
        .apexcharts-xaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }
        
        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }
        
        .apexcharts-xaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-left: -6px;
        }
        
        .apexcharts-xaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-left: -7px;
        }
        
        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
            bottom: 100%;
        }
        
        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
            top: 100%;
        }
        
        .apexcharts-xaxistooltip-bottom:after {
            border-bottom-color: #ECEFF1;
        }
        
        .apexcharts-xaxistooltip-bottom:before {
            border-bottom-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top:after {
            border-top-color: #ECEFF1
        }
        
        .apexcharts-xaxistooltip-top:before {
            border-top-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
            border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
            border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-yaxistooltip {
            opacity: 0;
            padding: 4px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
        }
        
        .apexcharts-yaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }
        
        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }
        
        .apexcharts-yaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-top: -6px;
        }
        
        .apexcharts-yaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-top: -7px;
        }
        
        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
            left: 100%;
        }
        
        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
            right: 100%;
        }
        
        .apexcharts-yaxistooltip-left:after {
            border-left-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-left:before {
            border-left-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
            border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
            border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right:after {
            border-right-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-right:before {
            border-right-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
            border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
            border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip.apexcharts-active {
            opacity: 1;
        }
        
        .apexcharts-yaxistooltip-hidden {
            display: none;
        }
        
        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
            pointer-events: none;
            opacity: 0;
            transition: 0.15s ease all;
        }
        
        .apexcharts-xcrosshairs.apexcharts-active,
        .apexcharts-ycrosshairs.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-ycrosshairs-hidden {
            opacity: 0;
        }
        
        .apexcharts-selection-rect {
            cursor: move;
        }
        
        .svg_select_boundingRect,
        .svg_select_points_rot {
            pointer-events: none;
            opacity: 0;
            visibility: hidden;
        }
        
        .apexcharts-selection-rect+g .svg_select_boundingRect,
        .apexcharts-selection-rect+g .svg_select_points_rot {
            opacity: 0;
            visibility: hidden;
        }
        
        .apexcharts-selection-rect+g .svg_select_points_l,
        .apexcharts-selection-rect+g .svg_select_points_r {
            cursor: ew-resize;
            opacity: 1;
            visibility: visible;
        }
        
        .svg_select_points {
            fill: #efefef;
            stroke: #333;
            rx: 2;
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
            cursor: crosshair
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-pan {
            cursor: move
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon,
        .apexcharts-reset-icon,
        .apexcharts-pan-icon,
        .apexcharts-selection-icon,
        .apexcharts-menu-icon,
        .apexcharts-toolbar-custom-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
            line-height: 24px;
            color: #6E8192;
            text-align: center;
        }
        
        .apexcharts-zoom-icon svg,
        .apexcharts-zoomin-icon svg,
        .apexcharts-zoomout-icon svg,
        .apexcharts-reset-icon svg,
        .apexcharts-menu-icon svg {
            fill: #6E8192;
        }
        
        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(0.76)
        }
        
        .apexcharts-theme-dark .apexcharts-zoom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomout-icon svg,
        .apexcharts-theme-dark .apexcharts-reset-icon svg,
        .apexcharts-theme-dark .apexcharts-pan-icon svg,
        .apexcharts-theme-dark .apexcharts-selection-icon svg,
        .apexcharts-theme-dark .apexcharts-menu-icon svg,
        .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
            fill: #f3f4f5;
        }
        
        .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
            fill: #008FFB;
        }
        
        .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
        .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
        .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
        .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
            fill: #333;
        }
        
        .apexcharts-selection-icon,
        .apexcharts-menu-icon {
            position: relative;
        }
        
        .apexcharts-reset-icon {
            margin-left: 5px;
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-reset-icon,
        .apexcharts-menu-icon {
            transform: scale(0.85);
        }
        
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            transform: scale(0.7)
        }
        
        .apexcharts-zoomout-icon {
            margin-right: 3px;
        }
        
        .apexcharts-pan-icon {
            transform: scale(0.62);
            position: relative;
            left: 1px;
            top: 0px;
        }
        
        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6E8192;
            stroke-width: 2;
        }
        
        .apexcharts-pan-icon.apexcharts-selected svg {
            stroke: #008FFB;
        }
        
        .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
            stroke: #333;
        }
        
        .apexcharts-toolbar {
            position: absolute;
            z-index: 11;
            max-width: 176px;
            text-align: right;
            border-radius: 3px;
            padding: 0px 6px 2px 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .apexcharts-menu {
            background: #fff;
            position: absolute;
            top: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 3px;
            right: 10px;
            opacity: 0;
            min-width: 110px;
            transition: 0.15s ease all;
            pointer-events: none;
        }
        
        .apexcharts-menu.apexcharts-menu-open {
            opacity: 1;
            pointer-events: all;
            transition: 0.15s ease all;
        }
        
        .apexcharts-menu-item {
            padding: 6px 7px;
            font-size: 12px;
            cursor: pointer;
        }
        
        .apexcharts-theme-light .apexcharts-menu-item:hover {
            background: #eee;
        }
        
        .apexcharts-theme-dark .apexcharts-menu {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
        }
        
        @media screen and (min-width: 768px) {
            .apexcharts-canvas:hover .apexcharts-toolbar {
                opacity: 1;
            }
        }
        
        .apexcharts-datalabel.apexcharts-element-hidden {
            opacity: 0;
        }
        
        .apexcharts-pie-label,
        .apexcharts-datalabels,
        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value {
            cursor: default;
            pointer-events: none;
        }
        
        .apexcharts-pie-label-delay {
            opacity: 0;
            animation-name: opaque;
            animation-duration: 0.3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease;
        }
        
        .apexcharts-canvas .apexcharts-element-hidden {
            opacity: 0;
        }
        
        .apexcharts-hide .apexcharts-series-points {
            opacity: 0;
        }
        
        .apexcharts-gridline,
        .apexcharts-annotation-rect,
        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-line,
        .apexcharts-zoom-rect,
        .apexcharts-toolbar svg,
        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-radar-series path,
        .apexcharts-radar-series polygon {
            pointer-events: none;
        }
        /* markers */
        
        .apexcharts-marker {
            transition: 0.15s ease all;
        }
        
        @keyframes opaque {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        /* Resize generated styles */
        
        @keyframes resizeanim {
            from {
                opacity: 0;
            }
            to {
                opacity: 0;
            }
        }
        
        .resize-triggers {
            animation: 1ms resizeanim;
            visibility: hidden;
            opacity: 0;
        }
        
        .resize-triggers,
        .resize-triggers>div,
        .contract-trigger:before {
            content: " ";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
        
        .resize-triggers>div {
            background: #eee;
            overflow: auto;
        }
        
        .contract-trigger:before {
            width: 200%;
            height: 200%;
        }
    </style>
    <style type="text/css">
        .VueCarousel-navigation-button[data-v-453ad8cd] {
            position: absolute;
            top: 50%;
            box-sizing: border-box;
            color: #000;
            text-decoration: none;
            appearance: none;
            border: none;
            background-color: transparent;
            padding: 0;
            cursor: pointer;
            outline: none;
        }
        
        .VueCarousel-navigation-button[data-v-453ad8cd]:focus {
            outline: 1px solid lightblue;
        }
        
        .VueCarousel-navigation-next[data-v-453ad8cd] {
            right: 0;
            transform: translateY(-50%) translateX(100%);
            font-family: "system";
        }
        
        .VueCarousel-navigation-prev[data-v-453ad8cd] {
            left: 0;
            transform: translateY(-50%) translateX(-100%);
            font-family: "system";
        }
        
        .VueCarousel-navigation--disabled[data-v-453ad8cd] {
            opacity: 0.5;
            cursor: default;
        }
        /* Define the "system" font family */
        
        @font-face {
            font-family: system;
            font-style: normal;
            font-weight: 300;
            src: local(".SFNSText-Light"), local(".HelveticaNeueDeskInterface-Light"), local(".LucidaGrandeUI"), local("Ubuntu Light"), local("Segoe UI Symbol"), local("Roboto-Light"), local("DroidSans"), local("Tahoma");
        }
    </style>
    <style type="text/css">
        .VueCarousel-pagination[data-v-438fd353] {
            width: 100%;
            text-align: center;
        }
        
        .VueCarousel-pagination--top-overlay[data-v-438fd353] {
            position: absolute;
            top: 0;
        }
        
        .VueCarousel-pagination--bottom-overlay[data-v-438fd353] {
            position: absolute;
            bottom: 0;
        }
        
        .VueCarousel-dot-container[data-v-438fd353] {
            display: inline-block;
            margin: 0 auto;
            padding: 0;
        }
        
        .VueCarousel-dot[data-v-438fd353] {
            display: inline-block;
            cursor: pointer;
            appearance: none;
            border: none;
            background-clip: content-box;
            box-sizing: content-box;
            padding: 0;
            border-radius: 100%;
            outline: none;
        }
        
        .VueCarousel-dot[data-v-438fd353]:focus {
            outline: 1px solid lightblue;
        }
    </style>
    <style type="text/css">
        .VueCarousel-slide {
            flex-basis: inherit;
            flex-grow: 0;
            flex-shrink: 0;
            user-select: none;
            backface-visibility: hidden;
            -webkit-touch-callout: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            outline: none;
        }
        
        .VueCarousel-slide-adjustableHeight {
            display: table;
            flex-basis: auto;
            width: 100%;
        }
    </style>
    <style type="text/css">
        .VueCarousel {
            display: flex;
            flex-direction: column;
            position: relative;
        }
        
        .VueCarousel--reverse {
            flex-direction: column-reverse;
        }
        
        .VueCarousel-wrapper {
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .VueCarousel-inner {
            display: flex;
            flex-direction: row;
            backface-visibility: hidden;
        }
        
        .VueCarousel-inner--center {
            justify-content: center;
        }
    </style>
    <style type="text/css"></style>
    <style type="text/css">
        .apexcharts-canvas {
            position: relative;
            user-select: none;
            /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
        }
        /* scrollbar is not visible by default for legend, hence forcing the visibility */
        
        .apexcharts-canvas ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px;
        }
        
        .apexcharts-canvas ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        }
        
        .apexcharts-inner {
            position: relative;
        }
        
        .apexcharts-text tspan {
            font-family: inherit;
        }
        
        .legend-mouseover-inactive {
            transition: 0.15s ease all;
            opacity: 0.20;
        }
        
        .apexcharts-series-collapsed {
            opacity: 0;
        }
        
        .apexcharts-tooltip {
            border-radius: 5px;
            box-shadow: 2px 2px 6px -4px #999;
            cursor: default;
            font-size: 14px;
            left: 62px;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            white-space: nowrap;
            z-index: 12;
            transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light {
            border: 1px solid #e3e3e3;
            background: rgba(255, 255, 255, 0.96);
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark {
            color: #fff;
            background: rgba(30, 30, 30, 0.8);
        }
        
        .apexcharts-tooltip * {
            font-family: inherit;
        }
        
        .apexcharts-tooltip-title {
            padding: 6px;
            font-size: 15px;
            margin-bottom: 4px;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
            background: #ECEFF1;
            border-bottom: 1px solid #ddd;
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
            background: rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid #333;
        }
        
        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            display: inline-block;
            font-weight: 600;
            margin-left: 5px;
        }
        
        .apexcharts-tooltip-text-z-label:empty,
        .apexcharts-tooltip-text-z-value:empty {
            display: none;
        }
        
        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            font-weight: 600;
        }
        
        .apexcharts-tooltip-marker {
            min-width: 12px;
            min-height: 12px;
            position: relative;
            top: 0px;
            margin-right: 10px;
            border-radius: 50%;
        }
        
        .apexcharts-tooltip-series-group {
            padding: 0 10px;
            display: none;
            text-align: left;
            justify-content: left;
            align-items: center;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
            opacity: 1;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active,
        .apexcharts-tooltip-series-group:last-child {
            padding-bottom: 4px;
        }
        
        .apexcharts-tooltip-series-group-hidden {
            opacity: 0;
            height: 0;
            line-height: 0;
            padding: 0 !important;
        }
        
        .apexcharts-tooltip-y-group {
            padding: 6px 0 5px;
        }
        
        .apexcharts-tooltip-box,
        .apexcharts-custom-tooltip {
            padding: 4px 8px;
        }
        
        .apexcharts-tooltip-boxPlot {
            display: flex;
            flex-direction: column-reverse;
        }
        
        .apexcharts-tooltip-box>div {
            margin: 4px 0;
        }
        
        .apexcharts-tooltip-box span.value {
            font-weight: bold;
        }
        
        .apexcharts-tooltip-rangebar {
            padding: 5px 8px;
        }
        
        .apexcharts-tooltip-rangebar .category {
            font-weight: 600;
            color: #777;
        }
        
        .apexcharts-tooltip-rangebar .series-name {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        .apexcharts-xaxistooltip {
            opacity: 0;
            padding: 9px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
            transition: 0.15s ease all;
        }
        
        .apexcharts-xaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }
        
        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }
        
        .apexcharts-xaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-left: -6px;
        }
        
        .apexcharts-xaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-left: -7px;
        }
        
        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
            bottom: 100%;
        }
        
        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
            top: 100%;
        }
        
        .apexcharts-xaxistooltip-bottom:after {
            border-bottom-color: #ECEFF1;
        }
        
        .apexcharts-xaxistooltip-bottom:before {
            border-bottom-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top:after {
            border-top-color: #ECEFF1
        }
        
        .apexcharts-xaxistooltip-top:before {
            border-top-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
            border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
            border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-yaxistooltip {
            opacity: 0;
            padding: 4px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
        }
        
        .apexcharts-yaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }
        
        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }
        
        .apexcharts-yaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-top: -6px;
        }
        
        .apexcharts-yaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-top: -7px;
        }
        
        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
            left: 100%;
        }
        
        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
            right: 100%;
        }
        
        .apexcharts-yaxistooltip-left:after {
            border-left-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-left:before {
            border-left-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
            border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
            border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right:after {
            border-right-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-right:before {
            border-right-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
            border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
            border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip.apexcharts-active {
            opacity: 1;
        }
        
        .apexcharts-yaxistooltip-hidden {
            display: none;
        }
        
        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
            pointer-events: none;
            opacity: 0;
            transition: 0.15s ease all;
        }
        
        .apexcharts-xcrosshairs.apexcharts-active,
        .apexcharts-ycrosshairs.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-ycrosshairs-hidden {
            opacity: 0;
        }
        
        .apexcharts-selection-rect {
            cursor: move;
        }
        
        .svg_select_boundingRect,
        .svg_select_points_rot {
            pointer-events: none;
            opacity: 0;
            visibility: hidden;
        }
        
        .apexcharts-selection-rect+g .svg_select_boundingRect,
        .apexcharts-selection-rect+g .svg_select_points_rot {
            opacity: 0;
            visibility: hidden;
        }
        
        .apexcharts-selection-rect+g .svg_select_points_l,
        .apexcharts-selection-rect+g .svg_select_points_r {
            cursor: ew-resize;
            opacity: 1;
            visibility: visible;
        }
        
        .svg_select_points {
            fill: #efefef;
            stroke: #333;
            rx: 2;
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
            cursor: crosshair
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-pan {
            cursor: move
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon,
        .apexcharts-reset-icon,
        .apexcharts-pan-icon,
        .apexcharts-selection-icon,
        .apexcharts-menu-icon,
        .apexcharts-toolbar-custom-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
            line-height: 24px;
            color: #6E8192;
            text-align: center;
        }
        
        .apexcharts-zoom-icon svg,
        .apexcharts-zoomin-icon svg,
        .apexcharts-zoomout-icon svg,
        .apexcharts-reset-icon svg,
        .apexcharts-menu-icon svg {
            fill: #6E8192;
        }
        
        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(0.76)
        }
        
        .apexcharts-theme-dark .apexcharts-zoom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomout-icon svg,
        .apexcharts-theme-dark .apexcharts-reset-icon svg,
        .apexcharts-theme-dark .apexcharts-pan-icon svg,
        .apexcharts-theme-dark .apexcharts-selection-icon svg,
        .apexcharts-theme-dark .apexcharts-menu-icon svg,
        .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
            fill: #f3f4f5;
        }
        
        .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
            fill: #008FFB;
        }
        
        .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
        .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
        .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
        .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
            fill: #333;
        }
        
        .apexcharts-selection-icon,
        .apexcharts-menu-icon {
            position: relative;
        }
        
        .apexcharts-reset-icon {
            margin-left: 5px;
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-reset-icon,
        .apexcharts-menu-icon {
            transform: scale(0.85);
        }
        
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            transform: scale(0.7)
        }
        
        .apexcharts-zoomout-icon {
            margin-right: 3px;
        }
        
        .apexcharts-pan-icon {
            transform: scale(0.62);
            position: relative;
            left: 1px;
            top: 0px;
        }
        
        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6E8192;
            stroke-width: 2;
        }
        
        .apexcharts-pan-icon.apexcharts-selected svg {
            stroke: #008FFB;
        }
        
        .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
            stroke: #333;
        }
        
        .apexcharts-toolbar {
            position: absolute;
            z-index: 11;
            max-width: 176px;
            text-align: right;
            border-radius: 3px;
            padding: 0px 6px 2px 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .apexcharts-menu {
            background: #fff;
            position: absolute;
            top: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 3px;
            right: 10px;
            opacity: 0;
            min-width: 110px;
            transition: 0.15s ease all;
            pointer-events: none;
        }
        
        .apexcharts-menu.apexcharts-menu-open {
            opacity: 1;
            pointer-events: all;
            transition: 0.15s ease all;
        }
        
        .apexcharts-menu-item {
            padding: 6px 7px;
            font-size: 12px;
            cursor: pointer;
        }
        
        .apexcharts-theme-light .apexcharts-menu-item:hover {
            background: #eee;
        }
        
        .apexcharts-theme-dark .apexcharts-menu {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
        }
        
        @media screen and (min-width: 768px) {
            .apexcharts-canvas:hover .apexcharts-toolbar {
                opacity: 1;
            }
        }
        
        .apexcharts-datalabel.apexcharts-element-hidden {
            opacity: 0;
        }
        
        .apexcharts-pie-label,
        .apexcharts-datalabels,
        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value {
            cursor: default;
            pointer-events: none;
        }
        
        .apexcharts-pie-label-delay {
            opacity: 0;
            animation-name: opaque;
            animation-duration: 0.3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease;
        }
        
        .apexcharts-canvas .apexcharts-element-hidden {
            opacity: 0;
        }
        
        .apexcharts-hide .apexcharts-series-points {
            opacity: 0;
        }
        
        .apexcharts-gridline,
        .apexcharts-annotation-rect,
        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-line,
        .apexcharts-zoom-rect,
        .apexcharts-toolbar svg,
        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-radar-series path,
        .apexcharts-radar-series polygon {
            pointer-events: none;
        }
        /* markers */
        
        .apexcharts-marker {
            transition: 0.15s ease all;
        }
        
        @keyframes opaque {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        /* Resize generated styles */
        
        @keyframes resizeanim {
            from {
                opacity: 0;
            }
            to {
                opacity: 0;
            }
        }
        
        .resize-triggers {
            animation: 1ms resizeanim;
            visibility: hidden;
            opacity: 0;
        }
        
        .resize-triggers,
        .resize-triggers>div,
        .contract-trigger:before {
            content: " ";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
        
        .resize-triggers>div {
            background: #eee;
            overflow: auto;
        }
        
        .contract-trigger:before {
            width: 200%;
            height: 200%;
        }
        .new_card{
            border: 1px solid red;
        }
        .profile_card .media {
            padding-bottom: unset !important;
            margin-bottom: unset !important;
        }
        p{
            margin: 0px !important;
        }
    </style>
</head>