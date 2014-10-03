joint.shapes.basic.Terminal = joint.shapes.basic.Rect.extend({
    defaults: joint.util.deepSupplement({
        size: {width: 100, height: 40},
        name: '',
        type: 'basic.Terminal',
        attrs: {

            'rect': { stroke: 'black', width: 100, height: 60, rx: 15, ry: 30 },
            'text': { 'ref-x': .5, 'ref-y': .5, 'font-size': '10px', ref: 'rect', 'y-alignment': 'middle', 'x-alignment': 'middle', 'fill': 'black'}
        }
    }, joint.shapes.basic.Rect.prototype.defaults)
});

joint.shapes.basic.Process = joint.shapes.basic.Rect.extend({
    name: '',
    defaults: joint.util.deepSupplement({
        size: {width: 100, height: 100},
        type: 'basic.Process',
        attrs: {
            'rect': { stroke: 'black', width: 100, height: 60 },
            'text': {'font-size': '10px' }
        }
    }, joint.shapes.basic.Rect.prototype.defaults)
});
joint.shapes.basic.Decision = joint.shapes.basic.Rhombus.extend({
    name: '',
    defaults: joint.util.deepSupplement({
        size: { width: 100, height: 100 },
        type: 'basic.Decision',
        attrs: {
            'text': { 'font-size': '10px' }
        }
    }, joint.shapes.basic.Rhombus.prototype.defaults)
});
joint.shapes.basic.Input = joint.shapes.basic.Path.extend({
    name: '',
    defaults: joint.util.deepSupplement({
        size: {width: 100, height: 100},
        type: 'basic.Input',
        attrs: {
            'path': { d: 'M 0 0 L 30 0 L 45 30 L 15 30 z' },
            'text': { 'ref-y': .5, 'font-size': '10px'}
        }
    }, joint.shapes.basic.Path.prototype.defaults)
});

joint.shapes.basic.Connector = joint.shapes.basic.Path.extend({
    name: '',
    defaults: joint.util.deepSupplement({
        size: {width: 40, height: 40},
        type: 'basic.Coonector',
        attrs: {
            'path': { d: 'M 0 0 L 30 0 L 30 30 L 15 45 L 0 30 z' },
            'text': { 'ref-y': .5, 'font-size': '10px'}
        }
        
    }, joint.shapes.basic.Path.prototype.defaults)
});

joint.shapes.basic.Database = joint.shapes.basic.Path.extend({
    name: '',
    defaults: joint.util.deepSupplement({
        size: {width: 100, height: 100},
        type: 'basic.Database',
        attrs: {
            'path': { d: "M27.896,2.148C26.012,0.997,22.598,0.004,16.001,0C9.402,0.004,5.988,0.997,4.103,2.148 C2.207,3.283,1.975,4.726,2.002,4.999v22.74c-0.035,0.353,0.305,1.628,2.176,2.524C6.045,31.189,9.416,31.994,16,32 c6.582-0.006,9.955-0.811,11.82-1.736c1.873-0.896,2.213-2.173,2.178-2.524V4.999C30.025,4.727,29.793,3.284,27.896,2.148z  M28,27.636c-0.02,0.042-0.076,0.13-0.223,0.271C27.15,28.552,24.43,30.02,16,30c-6.414,0.007-9.541-0.82-10.925-1.523 C4.381,28.126,4.088,27.828,4,27.695c-0.018-0.026,0.009-0.047,0.002-0.062L4,7.783C4.036,7.806,4.064,7.83,4.103,7.852 C5.988,9.001,9.402,9.993,16.001,10c6.597-0.006,10.011-0.999,11.896-2.147C27.934,7.83,27.963,7.805,28,7.783V27.636z"},
            'text': { 'ref-y': .5, 'font-size': '10px'}
        }
    }, joint.shapes.basic.Path.prototype.defaults)
});



joint.dia.Connection = joint.dia.Link.extend({ 
    name: '', 
    defaults: joint.util.deepSupplement({
        //router: {name: 'manhattan'}
        //router: {name: 'metro'}
        //router: {name: 'orthogonal'}
        router: { name: 'manhattan' },
        connector: { name: 'rounded' },
        attrs: {
            '.connection': {
                stroke: '#333333',
                'stroke-width': 2
            },
            '.marker-target': {
                fill: '#333333',
                d: 'M 10 0 L 0 5 L 10 10 z'
            }
        },
        labels: [
            { position: .5, attrs: { text: { text: '' , 'font-size': '10px'} } }
        ]
    }, joint.dia.Link.prototype.defaults)
});



joint.dia.ConnectionN = joint.dia.Connection.extend({    

    defaults: joint.util.deepSupplement({
        labels: [
            { attrs: { text: { text: 'N'} } }
        ]
    }, joint.dia.Connection.prototype.defaults)

});

joint.dia.ConnectionY = joint.dia.Connection.extend({    

    defaults: joint.util.deepSupplement({
        labels: [
            { attrs: { text: { text: 'Y' } } }
        ]
    }, joint.dia.Connection.prototype.defaults)
    
});


$(document).ready(function(){
    $("svg").each(function(){
        var bBox = this.getBBox();
        $(this).attr("width", bBox.width);
        $(this).attr("height", bBox.height);
    });
});
