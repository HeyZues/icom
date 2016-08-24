/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
//images folder
var im='../images/inicio/';

var fonts = {};
var opts = {
    'gAudioPreloadPreference': 'auto',

    'gVideoPreloadPreference': 'auto'
};
var resources = [
];
var symbols = {
"stage": {
    version: "4.0.0",
    minimumCompatibleVersion: "4.0.0",
    build: "4.0.0.359",
    baseState: "Base State",
    scaleToFit: "both",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
            {
                id: 'fotosBanner_1',
                display: 'block',
                type: 'image',
                rect: ['0px', '-2px','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_1.jpg",'0px','0px']
            },
            {
                id: 'fotosBanner_2',
                type: 'image',
                rect: ['0', '0','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_2.jpg",'0px','0px']
            },
            {
                id: 'fotosBanner_3',
                type: 'image',
                rect: ['0', '0px','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_3.jpg",'0px','0px']
            },
            {
                id: 'fotosBanner_4',
                type: 'image',
                rect: ['1px', '2px','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_4.jpg",'0px','0px']
            },
            {
                id: 'fotosBanner_5',
                type: 'image',
                rect: ['0px', '0px','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_5.jpg",'0px','0px']
            },
            {
                id: 'fotosBanner_6',
                type: 'image',
                rect: ['1', '-2','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_6.jpg",'0px','0px']
            },
            {
                id: 'fotosBanner_7',
                type: 'image',
                rect: ['0', '-2','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_7.jpg",'0px','0px']
            },
            {
                id: 'fotosBanner_8',
                type: 'image',
                rect: ['1', '-2','1200px','445px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"fotosBanner_8.jpg",'0px','0px']
            },
            {
                id: 'barra_textos',
                type: 'image',
                rect: ['0px', '0px','1200px','600px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"barra_textos.png",'0px','0px']
            },
            {
                id: 'boton_servicios',
                type: 'rect',
                rect: ['-20', '306','auto','auto','auto', 'auto']
            },
            {
                id: 'banner_principal_thumbs7',
                type: 'image',
                rect: ['1056px', '447px','152px','121px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs7.jpg",'0px','0px']
            },
            {
                id: 'Rectangle10',
                type: 'rect',
                rect: ['1056px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,1)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'banner_principal_thumbs6',
                type: 'image',
                rect: ['904px', '447px','152px','121px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs6.jpg",'0px','0px']
            },
            {
                id: 'Rectangle9',
                type: 'rect',
                rect: ['904px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,1)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'banner_principal_thumbs5',
                type: 'image',
                rect: ['752px', '447px','152px','121px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs5.jpg",'0px','0px']
            },
            {
                id: 'Rectangle8',
                type: 'rect',
                rect: ['752px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,1)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'banner_principal_thumbs4',
                type: 'image',
                rect: ['600px', '447px','152px','121px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs4.jpg",'0px','0px']
            },
            {
                id: 'Rectangle7',
                type: 'rect',
                rect: ['601px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,1)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'banner_principal_thumbs3',
                type: 'image',
                rect: ['448px', '447px','152px','121px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs3.jpg",'0px','0px']
            },
            {
                id: 'Rectangle6',
                type: 'rect',
                rect: ['448px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,1)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'banner_principal_thumbs2',
                type: 'image',
                rect: ['300px', '447px','152px','121px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs2.jpg",'0px','0px']
            },
            {
                id: 'Rectangle4',
                type: 'rect',
                rect: ['300px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                opacity: 0.66,
                fill: ["rgba(0,0,0,1)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'banner_principal_thumbs1',
                type: 'image',
                rect: ['148px', '447px','152px','121px','auto', 'auto'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs1.jpg",'0px','0px']
            },
            {
                id: 'Rectangle2',
                type: 'rect',
                rect: ['152px', '447px','148px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,1)"],
                stroke: [0,"rgb(0, 0, 0)","none"]
            },
            {
                id: 'banner_principal_thumbs0',
                type: 'image',
                rect: ['0px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,0)",im+"banner_principal_thumbs0.jpg",'0px','0px']
            },
            {
                id: 'Rectangle',
                type: 'rect',
                rect: ['0px', '447px','152px','121px','auto', 'auto'],
                cursor: ['pointer'],
                fill: ["rgba(0,0,0,1.00)"],
                stroke: [0,"rgba(0,0,0,1)","none"]
            },
            {
                id: 'T1',
                type: 'text',
                rect: ['22px', '153px','169px','121px','auto', 'auto'],
                text: "CIMENTACIONES",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1.00)", "100", "none", ""]
            },
            {
                id: 'T2',
                type: 'text',
                rect: ['17px', '153px','auto','auto','auto', 'auto'],
                text: "CONSTRUCCI&Oacute;N<br />Y DISE&Ntilde;O",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1)", "100", "none", "normal"]
            },
            {
                id: 'T3',
                type: 'text',
                rect: ['22px', '182px','auto','auto','auto', 'auto'],
                text: "INGENIER&Iacute;A<br />Y DESARROLLO",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1)", "100", "none", "normal"]
            },
            {
                id: 'T4',
                type: 'text',
                rect: ['17px', '153px','auto','auto','auto', 'auto'],
                text: "SISTEMAS CONTRA<br />INCENDIOS",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1)", "100", "none", "normal"]
            },
            {
                id: 'T5',
                type: 'text',
                rect: ['17px', '153px','auto','auto','auto', 'auto'],
                text: "&Aacute;REAS VERDES Y<br />DEPORTIVAS",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1)", "100", "none", "normal"]
            },
            {
                id: 'T6',
                type: 'text',
                rect: ['17px', '182px','auto','auto','auto', 'auto'],
                text: "RECUBRIMIENTOS<br />Y SUPERFICIES",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1)", "100", "none", "normal"]
            },
            {
                id: 'T7',
                type: 'text',
                rect: ['21px', '153px','auto','auto','auto', 'auto'],
                text: "LOG&Iacute;STICA Y <br>PLATAFORMAS DE <br />ELEVACI&Oacute;N",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1)", "100", "none", "normal"]
            },
            {
                id: 'T8',
                type: 'text',
                rect: ['22px', '153px','auto','auto','auto', 'auto'],
                text: "CARPINTER&Iacute;A",
                align: "left",
                font: ['Arial, Helvetica, sans-serif', 50, "rgba(255,255,255,1)", "100", "none", "normal"]
            }],
            symbolInstances: [
            {
                id: 'boton_servicios',
                symbolName: 'boton_servicios',
                autoPlay: {

                }
            }
            ]
        },
    states: {
        "Base State": {
            "${_Rectangle2}": [
                ["style", "opacity", '0'],
                ["style", "cursor", 'pointer'],
                ["style", "width", '148px']
            ],
            "${_banner_principal_thumbs7}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '1056px'],
                ["style", "width", '152px']
            ],
            "${_T8}": [
                ["style", "top", '153px'],
                ["style", "opacity", '0'],
                ["style", "left", '22px']
            ],
            "${_T1}": [
                ["style", "top", '153px'],
                ["style", "font-size", '50px'],
                ["color", "color", 'rgba(255,255,255,1.00)'],
                ["style", "opacity", '0'],
                ["style", "height", '121px'],
                ["style", "font-weight", '100'],
                ["style", "left", '22px'],
                ["style", "width", 'auto']
            ],
            "${_T6}": [
                ["style", "top", '155px'],
                ["style", "opacity", '0'],
                ["style", "left", '17px']
            ],
            "${_Rectangle7}": [
                ["style", "cursor", 'pointer'],
                ["style", "opacity", '0']
            ],
            "${_fotosBanner_4}": [
                ["style", "top", '2px'],
                ["style", "opacity", '0'],
                ["style", "left", '1px']
            ],
            "${_T3}": [
                ["style", "top", '158px'],
                ["style", "opacity", '0'],
                ["style", "left", '22px']
            ],
            "${_banner_principal_thumbs3}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '448px'],
                ["style", "width", '152px']
            ],
            "${_banner_principal_thumbs0}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '0px'],
                ["style", "cursor", 'pointer'],
                ["style", "width", '152px']
            ],
            "${_fotosBanner_3}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0']
            ],
            "${_banner_principal_thumbs2}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '300px'],
                ["style", "width", '152px']
            ],
            "${_boton_servicios}": [
                ["transform", "scaleX", '0.83179'],
                ["style", "left", '-20px']
            ],
            "${_Rectangle10}": [
                ["style", "cursor", 'pointer'],
                ["style", "opacity", '0']
            ],
            "${_fotosBanner_1}": [
                ["style", "top", '-2px'],
                ["style", "display", 'block'],
                ["style", "opacity", '0'],
                ["style", "left", '0px'],
                ["style", "width", '1200px']
            ],
            "${_Rectangle9}": [
                ["style", "cursor", 'pointer'],
                ["style", "opacity", '0']
            ],
            "${_fotosBanner_7}": [
                ["style", "opacity", '0']
            ],
            "${_Rectangle}": [
                ["color", "background-color", 'rgba(0,0,0,1.00)'],
                ["style", "opacity", '0'],
                ["style", "cursor", 'pointer'],
                ["style", "left", '0px']
            ],
            "${_Rectangle8}": [
                ["style", "cursor", 'pointer'],
                ["style", "opacity", '0']
            ],
            "${_T5}": [
                ["style", "top", '153px'],
                ["style", "opacity", '0'],
                ["style", "left", '17px']
            ],
            "${_banner_principal_thumbs5}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '752px'],
                ["style", "width", '152px']
            ],
            "${_T7}": [
                ["style", "top", '132px'],
                ["style", "opacity", '0'],
                ["style", "left", '21px']
            ],
            "${_T4}": [
                ["style", "top", '153px'],
                ["style", "opacity", '0'],
                ["style", "left", '17px']
            ],
            "${_fotosBanner_6}": [
                ["style", "opacity", '0']
            ],
            "${_banner_principal_thumbs6}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '904px'],
                ["style", "width", '152px']
            ],
            "${_banner_principal_thumbs4}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '600px'],
                ["style", "width", '152px']
            ],
            "${_fotosBanner_8}": [
                ["style", "opacity", '0']
            ],
            "${_fotosBanner_2}": [
                ["style", "opacity", '0']
            ],
            "${_T2}": [
                ["style", "top", '153px'],
                ["style", "opacity", '0'],
                ["style", "left", '17px']
            ],
            "${_fotosBanner_5}": [
                ["style", "top", '0px'],
                ["style", "opacity", '0'],
                ["style", "left", '0px']
            ],
            "${_Rectangle4}": [
                ["style", "cursor", 'pointer'],
                ["style", "opacity", '0']
            ],
            "${_Stage}": [
                ["color", "background-color", 'rgba(255,255,255,1)'],
                ["style", "overflow", 'hidden'],
                ["style", "height", '600px'],
                ["style", "width", '1200px']
            ],
            "${_barra_textos}": [
                ["style", "top", '0px'],
                ["style", "left", '0px']
            ],
            "${_Rectangle6}": [
                ["style", "cursor", 'pointer'],
                ["style", "opacity", '0']
            ],
            "${_banner_principal_thumbs1}": [
                ["style", "top", '447px'],
                ["style", "height", '121px'],
                ["style", "left", '148px'],
                ["style", "width", '152px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 24250,
            autoPlay: true,
            timeline: [
                { id: "eid225", tween: [ "style", "${_T5}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid185", tween: [ "style", "${_T5}", "opacity", '0', { fromValue: '0'}], position: 12032, duration: 0 },
                { id: "eid186", tween: [ "style", "${_T5}", "opacity", '1', { fromValue: '0'}], position: 12032, duration: 479 },
                { id: "eid189", tween: [ "style", "${_T5}", "opacity", '0', { fromValue: '1'}], position: 15004, duration: 246 },
                { id: "eid223", tween: [ "style", "${_T6}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid193", tween: [ "style", "${_T6}", "opacity", '0', { fromValue: '0'}], position: 15014, duration: 0 },
                { id: "eid194", tween: [ "style", "${_T6}", "opacity", '1', { fromValue: '0'}], position: 15014, duration: 500 },
                { id: "eid197", tween: [ "style", "${_T6}", "opacity", '0', { fromValue: '1'}], position: 18013, duration: 229 },
                { id: "eid3", tween: [ "style", "${_fotosBanner_1}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 250 },
                { id: "eid7", tween: [ "style", "${_fotosBanner_1}", "opacity", '0', { fromValue: '1'}], position: 3000, duration: 250 },
                { id: "eid149", tween: [ "style", "${_fotosBanner_1}", "opacity", '1', { fromValue: '0'}], position: 24002, duration: 248 },
                { id: "eid182", tween: [ "style", "${_T3}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid171", tween: [ "style", "${_T3}", "opacity", '0', { fromValue: '0'}], position: 6028, duration: 0 },
                { id: "eid172", tween: [ "style", "${_T3}", "opacity", '1', { fromValue: '0'}], position: 6028, duration: 460 },
                { id: "eid175", tween: [ "style", "${_T3}", "opacity", '0', { fromValue: '1'}], position: 9007, duration: 243 },
                { id: "eid99", tween: [ "style", "${_Rectangle4}", "opacity", '0.66', { fromValue: '0'}], position: 6000, duration: 250 },
                { id: "eid102", tween: [ "style", "${_Rectangle4}", "opacity", '0', { fromValue: '0.660000'}], position: 9000, duration: 250 },
                { id: "eid239", tween: [ "style", "${_T3}", "top", '158px', { fromValue: '158px'}], position: 0, duration: 0 },
                { id: "eid235", tween: [ "style", "${_T6}", "top", '155px', { fromValue: '155px'}], position: 2983, duration: 0 },
                { id: "eid178", tween: [ "style", "${_T4}", "opacity", '1', { fromValue: '0'}], position: 9024, duration: 487 },
                { id: "eid181", tween: [ "style", "${_T4}", "opacity", '0', { fromValue: '1'}], position: 12008, duration: 240 },
                { id: "eid60", tween: [ "style", "${_fotosBanner_3}", "opacity", '1', { fromValue: '0'}], position: 6000, duration: 250 },
                { id: "eid63", tween: [ "style", "${_fotosBanner_3}", "opacity", '0', { fromValue: '1'}], position: 9000, duration: 250 },
                { id: "eid156", tween: [ "style", "${_T1}", "opacity", '1', { fromValue: '0'}], position: 0, duration: 503 },
                { id: "eid159", tween: [ "style", "${_T1}", "opacity", '0', { fromValue: '1'}], position: 3013, duration: 246 },
                { id: "eid118", tween: [ "style", "${_Rectangle8}", "opacity", '0.66', { fromValue: '0'}], position: 15000, duration: 250 },
                { id: "eid121", tween: [ "style", "${_Rectangle8}", "opacity", '0', { fromValue: '0.660000'}], position: 18000, duration: 250 },
                { id: "eid151", tween: [ "style", "${_Rectangle7}", "opacity", '0', { fromValue: '0'}], position: 6248, duration: 0 },
                { id: "eid112", tween: [ "style", "${_Rectangle7}", "opacity", '0.66', { fromValue: '0'}], position: 12000, duration: 250 },
                { id: "eid115", tween: [ "style", "${_Rectangle7}", "opacity", '0', { fromValue: '0.660000'}], position: 15000, duration: 250 },
                { id: "eid72", tween: [ "style", "${_fotosBanner_5}", "opacity", '1', { fromValue: '0'}], position: 12000, duration: 250 },
                { id: "eid75", tween: [ "style", "${_fotosBanner_5}", "opacity", '0', { fromValue: '1'}], position: 15000, duration: 250 },
                { id: "eid106", tween: [ "style", "${_Rectangle6}", "opacity", '0.66', { fromValue: '0'}], position: 9000, duration: 250 },
                { id: "eid109", tween: [ "style", "${_Rectangle6}", "opacity", '0', { fromValue: '0.660000'}], position: 12000, duration: 250 },
                { id: "eid4", tween: [ "style", "${_fotosBanner_1}", "display", 'block', { fromValue: 'block'}], position: 3000, duration: 0 },
                { id: "eid8", tween: [ "style", "${_fotosBanner_1}", "display", 'none', { fromValue: 'block'}], position: 3250, duration: 0 },
                { id: "eid146", tween: [ "style", "${_fotosBanner_1}", "display", 'block', { fromValue: 'none'}], position: 24002, duration: 0 },
                { id: "eid233", tween: [ "transform", "${_boton_servicios}", "scaleX", '0.83179', { fromValue: '0.83179'}], position: 17829, duration: 0 },
                { id: "eid221", tween: [ "style", "${_T7}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid200", tween: [ "style", "${_T7}", "opacity", '0', { fromValue: '0'}], position: 18027, duration: 0 },
                { id: "eid201", tween: [ "style", "${_T7}", "opacity", '1', { fromValue: '0'}], position: 18027, duration: 493 },
                { id: "eid204", tween: [ "style", "${_T7}", "opacity", '0', { fromValue: '1'}], position: 21001, duration: 245 },
                { id: "eid66", tween: [ "style", "${_fotosBanner_4}", "opacity", '1', { fromValue: '0'}], position: 9000, duration: 250 },
                { id: "eid69", tween: [ "style", "${_fotosBanner_4}", "opacity", '0', { fromValue: '1'}], position: 12000, duration: 250 },
                { id: "eid84", tween: [ "style", "${_fotosBanner_7}", "opacity", '1', { fromValue: '0'}], position: 18000, duration: 250 },
                { id: "eid87", tween: [ "style", "${_fotosBanner_7}", "opacity", '0', { fromValue: '1'}], position: 21000, duration: 250 },
                { id: "eid238", tween: [ "style", "${_T7}", "top", '132px', { fromValue: '132px'}], position: 0, duration: 0 },
                { id: "eid165", tween: [ "style", "${_T2}", "opacity", '0', { fromValue: '0'}], position: 0, duration: 0 },
                { id: "eid162", tween: [ "style", "${_T2}", "opacity", '0', { fromValue: '0'}], position: 3002, duration: 0 },
                { id: "eid163", tween: [ "style", "${_T2}", "opacity", '1', { fromValue: '0'}], position: 3009, duration: 492 },
                { id: "eid168", tween: [ "style", "${_T2}", "opacity", '0', { fromValue: '1'}], position: 6020, duration: 253 },
                { id: "eid42", tween: [ "style", "${_Rectangle}", "opacity", '0.66147629310345', { fromValue: '0'}], position: 0, duration: 250 },
                { id: "eid45", tween: [ "style", "${_Rectangle}", "opacity", '0', { fromValue: '0.6614760160446167'}], position: 3000, duration: 250 },
                { id: "eid145", tween: [ "style", "${_Rectangle}", "opacity", '0.66', { fromValue: '0'}], position: 24000, duration: 246 },
                { id: "eid78", tween: [ "style", "${_fotosBanner_6}", "opacity", '1', { fromValue: '0'}], position: 15000, duration: 250 },
                { id: "eid81", tween: [ "style", "${_fotosBanner_6}", "opacity", '0', { fromValue: '1'}], position: 18000, duration: 250 },
                { id: "eid11", tween: [ "style", "${_fotosBanner_2}", "opacity", '1', { fromValue: '0'}], position: 3000, duration: 250 },
                { id: "eid54", tween: [ "style", "${_fotosBanner_2}", "opacity", '0', { fromValue: '1'}], position: 6000, duration: 250 },
                { id: "eid130", tween: [ "style", "${_Rectangle10}", "opacity", '0.66', { fromValue: '0'}], position: 21000, duration: 250 },
                { id: "eid133", tween: [ "style", "${_Rectangle10}", "opacity", '0', { fromValue: '0.660000'}], position: 24000, duration: 250 },
                { id: "eid214", tween: [ "style", "${_T8}", "opacity", '1', { fromValue: '0'}], position: 20996, duration: 522 },
                { id: "eid219", tween: [ "style", "${_T8}", "opacity", '0', { fromValue: '1'}], position: 24013, duration: 230 },
                { id: "eid48", tween: [ "style", "${_Rectangle2}", "opacity", '0.66', { fromValue: '0'}], position: 3000, duration: 250 },
                { id: "eid96", tween: [ "style", "${_Rectangle2}", "opacity", '0', { fromValue: '0.660000'}], position: 6000, duration: 250 },
                { id: "eid234", tween: [ "style", "${_boton_servicios}", "left", '-20px', { fromValue: '-20px'}], position: 17829, duration: 0 },
                { id: "eid124", tween: [ "style", "${_Rectangle9}", "opacity", '0.66', { fromValue: '0'}], position: 18000, duration: 250 },
                { id: "eid127", tween: [ "style", "${_Rectangle9}", "opacity", '0', { fromValue: '0.660000'}], position: 21000, duration: 250 },
                { id: "eid90", tween: [ "style", "${_fotosBanner_8}", "opacity", '1', { fromValue: '0'}], position: 21000, duration: 250 },
                { id: "eid93", tween: [ "style", "${_fotosBanner_8}", "opacity", '0', { fromValue: '1'}], position: 24000, duration: 250 }            ]
        }
    }
},
"boton_servicios": {
    version: "4.0.0",
    minimumCompatibleVersion: "4.0.0",
    build: "4.0.0.359",
    baseState: "Base State",
    scaleToFit: "none",
    centerStage: "none",
    initialState: "Base State",
    gpuAccelerate: false,
    resizeInstances: false,
    content: {
            dom: [
                {
                    type: 'rect',
                    rect: ['0px', '0px', '240px', '63px', 'auto', 'auto'],
                    id: 'link',
                    stroke: [0, 'rgba(0,0,0,1)', 'none'],
                    cursor: ['pointer'],
                    fill: ['rgba(0,0,0,1.00)']
                }
            ],
            symbolInstances: [
            ]
        },
    states: {
        "Base State": {
            "${symbolSelector}": [
                ["style", "height", '63px'],
                ["style", "width", '240px']
            ],
            "${_link}": [
                ["color", "background-color", 'rgba(0,0,0,1.00)'],
                ["style", "top", '0px'],
                ["style", "left", '0px'],
                ["style", "height", '63px'],
                ["style", "opacity", '0'],
                ["style", "cursor", 'pointer'],
                ["style", "width", '240px']
            ]
        }
    },
    timelines: {
        "Default Timeline": {
            fromState: "Base State",
            toState: "",
            duration: 749,
            autoPlay: true,
            timeline: [
                { id: "eid229", tween: [ "style", "${_link}", "opacity", '0.6', { fromValue: '0'}], position: 0, duration: 749 }            ]
        }
    }
}
};


Edge.registerCompositionDefn(compId, symbols, fonts, resources, opts);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-5077574");
