(function(){

var gArray = Array();
var graph = new joint.dia.Graph;
var paper = new joint.dia.Paper({
    el: $('#graph2'),
    width: 960,
    height: 960,
    model: graph,
    gridSize: 1,
    interactive: false
});

joint.shapes.basic.Decision = joint.shapes.basic.Decision.extend({
    defaults: joint.util.deepSupplement({
        size: { width: 100, height: 100 },
        type: 'basic.Decision',
        attrs: {
            'text': { 'font-size': '10px' }
        }
    }, joint.shapes.basic.Rhombus.prototype.defaults)
});


/************** Nodes **************/
var begin = new joint.shapes.basic.Connector({
    name: 'begin',
    position: { x: 30, y: 0 },
    size: {width: 40, height: 40},
    attrs: {path: {fill: 'blue'}, text: {text: 'P-1', fill: 'white'}}
});
gArray.push(begin);

var decision1 = new joint.shapes.basic.Decision({
    name: 'decision1',
    position: { x: 0, y: 100 },
    
    attrs: { text: { text: "6.5 <= A1c <= 7.5\n OR already at Monotherapy", fill: 'white' } }
});
gArray.push(decision1);


var decision11 = new joint.shapes.basic.Decision({
    name: 'decision11',
    position: { x: 0, y: 250 },
    
    attrs: { text: { text: "Start \nOR Continue Therapy", fill: 'white' } }
});
gArray.push(decision11);

var decision2 = new joint.shapes.basic.Decision({
    name: 'decision2',
    position: { x: 200, y: 100 },
    
    attrs: { text: { text: "7.5 < A1c <= 9\n OR already in Dual Therapy", fill: 'white' } }
});
gArray.push(decision2);

var decision21 = new joint.shapes.basic.Decision({
    name: 'decision21',
    position: { x: 200, y: 250 },
    
    attrs: { text: { text: "Start \nOR Continue Therapy", fill: 'white' } }
});
gArray.push(decision21);

var decision3 = new joint.shapes.basic.Decision({
    name: 'decision3',
    position: { x: 400, y: 100 },
    
    attrs: { text: { text: "(9 < A1c AND No symptoms)\n OR already at Triple Therapy", fill: 'white' } }
});
gArray.push(decision3);

var decision31 = new joint.shapes.basic.Decision({
    name: 'decision31',
    position: { x: 400, y: 250 },
    
    attrs: { text: { text: "Start \nOR Continue Therapy", fill: 'white' } }
});
gArray.push(decision31);

var decision4 = new joint.shapes.basic.Decision({
    name: 'decision4',
    position: { x: 600, y: 100 },
    
    attrs: { text: { text: "9 < A1c AND Symptoms", fill: 'white' } }
});
gArray.push(decision4);

var process1 = new joint.shapes.basic.Process({
    name: 'process1',
    position: {x: 0, y: 400},
    attrs: {text: {text: "Lifestyle change \n + Monotherapy", fill: 'black'}}
});
gArray.push(process1);

var process2 = new joint.shapes.basic.Process({
    name: 'process2',
    position: {x: 200, y: 400},
    
    attrs: {text: {text: "Lifestyle change \n + Dual Therapy", fill: 'black'}}
});
gArray.push(process2);

var process3 = new joint.shapes.basic.Process({
    name: 'process3',
    position: {x: 400, y: 400},
    attrs: {text: {text: "Lifestyle change \n + Triple Therapy", fill: 'black'}}
});
gArray.push(process3);

var process4 = new joint.shapes.basic.Process({
    name: 'process4',
    position: {x: 600, y: 400},    
    attrs: {text: {text: "Add or Intensify \n + Insulin", fill: 'black'}}
});
gArray.push(process4);

var connectorp3 = new joint.shapes.basic.Connector({
    name: 'connectorp3',
    position: {x: 30, y: 600},
    attrs: {text: {text: "P3", fill: 'black'}}
});
gArray.push(connectorp3);

var connectorp4 = new joint.shapes.basic.Connector({
    name: 'connectorp4',
    position: {x: 630, y: 600},
    attrs: {text: {text: "P4", fill: 'black'}}
});
gArray.push(connectorp4);

/************** Edges **************/
var link01 = new joint.dia.Connection({
    source: { id: begin.id },
    target: { id: decision1.id },
});
gArray.push(link01);

var link12 = new joint.dia.ConnectionN({
    source: { id: decision1.id },
    target: { id: decision2.id },
});
gArray.push(link12);

var link23 = new joint.dia.ConnectionN({
    source: { id: decision2.id },
    target: { id: decision3.id },
});
gArray.push(link23);

var link34 = new joint.dia.ConnectionN({
    source: { id: decision3.id },
    target: { id: decision4.id },
});
gArray.push(link34);

var link111 = new joint.dia.ConnectionY({
    source: { id: decision1.id },
    target: { id: decision11.id },
});
gArray.push(link111);

var link221 = new joint.dia.ConnectionY({
    source: { id: decision2.id },
    target: { id: decision21.id },
});
gArray.push(link221);

var link331 = new joint.dia.ConnectionY({
    source: { id: decision3.id },
    target: { id: decision31.id },
});
gArray.push(link331);

var link11p1 = new joint.dia.ConnectionY({
    source: { id: decision11.id },
    target: { id: process1.id },
});
gArray.push(link11p1);

var link21p2 = new joint.dia.ConnectionY({
    source: { id: decision21.id },
    target: { id: process2.id },
});
gArray.push(link21p2);

var link31p3 = new joint.dia.ConnectionY({
    source: { id: decision31.id },
    target: { id: process3.id },
});
gArray.push(link31p3);

var link1121 = new joint.dia.ConnectionN({
    source: { id: decision11.id },
    target: { id: decision21.id },
});
gArray.push(link1121);

var link2131 = new joint.dia.ConnectionN({
    source: { id: decision21.id },
    target: { id: decision31.id },
});
gArray.push(link2131);

var link31p4 = new joint.dia.ConnectionN({
    source: { id: decision31.id },
    target: { id: process4.id },
    router: { name: 'metro'}
});
gArray.push(link31p4);

var link4p4 = new joint.dia.ConnectionY({
    source: { id: decision4.id },
    target: { id: process4.id },
});
gArray.push(link4p4);

var linkp1c3 = new joint.dia.Connection({
    source: { id: process1.id },
    target: { id: connectorp3.id },
});
gArray.push(linkp1c3);

var linkp2c3 = new joint.dia.Connection({
    source: { id: process2.id },
    target: { id: connectorp3.id },
});
gArray.push(linkp2c3);

var linkp3c3 = new joint.dia.Connection({
    source: { id: process3.id },
    target: { id: connectorp3.id },
});
gArray.push(linkp3c3);

var linkp4c4 = new joint.dia.Connection({
    source: { id: process4.id },
    target: { id: connectorp4.id },
});
gArray.push(linkp4c4);


for (var el in gArray) {
    //console.log(gArray[el].attributes.name);
    var thisName = gArray[el].attributes.name;
    //gArray[el].attr('rect/fill', 'white');
    gArray[el].attr('path/fill', 'white');
    gArray[el].attr('text/fill', '#333');
    if(decisionPath[1].indexOf(thisName) > -1) {
        //gArray[el].attr('rect/fill', 'red');
        gArray[el].attr('path/fill', 'red');
        gArray[el].attr('text/fill', 'white');
        gArray[el].attr('text/font-weight', 'bold');
    }
};

graph.addCells(gArray);
})();

//$("svg").css("background-color", "#ccc");
        