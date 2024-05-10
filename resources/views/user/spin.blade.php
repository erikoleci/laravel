@extends('layouts.dashboard')
@section('style')

    <style>
     
     
     h1 {
  color: #fff;
  text-align: center;
}

h5 {
  color: #fff;
  font-size: 24px;
}

#fortune-wheel {
  font-family: PingFangTC, "Noto Sans TC", sans-serif;
  font-weight: lighter;
  margin: 0 auto;

  g.slice text {
    stroke: #fff;
    letter-spacing: 0.2em;
    font-size: 16px;
  }
  .centerspin {
    fill: #de135b;
    pointer-events: none;
  }
}

#awardresult {
  text-align: center;
}

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="  https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    


@endsection
@section('content')

    <div style="padding-bottom: 2%;" class="page-content-wrapper">

        <div class="container-fluid">
            <br>
            <h1 class="scrum-wheel">FORTUNE WHEEL</h1>
            <br>
            <div class="fortune d-flex align-items-center">
              <div id="fortune-wheel"></div>
              
            </div>
           
        </div>
    </div>

            <!-- END wrapper -->

@endsection

@section('scripts')


    <script src="{{ asset('plugins/d3/d3.min.js')}}"></script>

    <script>




var padding = { top: 0, right: 0, bottom: 0, left: 0 },
    // w = 500 - padding.left - padding.right,
    // h = 500 - padding.top - padding.bottom,
    w = 500,
    h = 500,
    r = Math.min(w, h) / 2,
    sw = 10, //stroke width
    rotation = 0,
    oldrotation = 0,
    picked = 100000,
    oldpick = [],
    color = d3.scale.category20();


var data = [
    { "label": "20€", "value": 20, "award": "20€" }, 
    { "label": "40€", "value": 40, "award": "40€" },
    { "label": "80€", "value": 80, "award": "80€" }, 
    { "label": "120€", "value": 120, "award": "120€" }, 
    { "label": "150€", "value": 150, "award": "150€" }, 
    { "label": "200€", "value": 200, "award": "200€" }, 
    { "label": "250€", "value": 250, "award": "250€" }, 
];

var svg = d3.select('#fortune-wheel')
    .append("svg")
    .data([data])
    .attr("width", w + padding.left + padding.right + 2*sw)
    .attr("height", h + padding.top + padding.bottom + 2*sw);

var bg = svg.append("defs").append("radialGradient")
    .attr("id", "svgbg")
    .attr("cx", "50%")
    .attr("cy", "50%")
    .attr("r", "50%")
    .attr("fx", "50%")
    .attr("fy", "50%");

var bgstop = bg.append("stop")
    .attr("offset", "85%")
    .style({ "stop-color": "#cbac76", "stop-opacity": "1" });

var bgstop = bg.append("stop")
    .attr("offset", "100%")
    .style({ "stop-color": "#cbac76", "stop-opacity": "1" });

var containerbg = svg.append("circle")
  .attr("cx", 0)
  .attr("cy", 0)
  .attr("r", w/2)
  .attr("fill","url(#svgbg)")
  .attr("stroke","#EDE7E8")
  .attr("stroke-width", sw )
  .attr("transform", "translate(" + (w / 2 + sw + padding.left) + "," + (h / 2 + sw + padding.top) + ")");
//<circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" />
var container = svg.append("g")
    .attr("class", "chartholder")
    .attr("transform", "translate(" + (w / 2 + sw + padding.left) + "," + (h / 2 + sw + padding.top) + ")");


var vis = container
    .append("g");

var pie = d3.layout.pie().sort(null).value(function (d) { return 1; });

// declare an arc generator function
var arc = d3.svg.arc().outerRadius(r-sw/2);

// select paths, use arc generator to draw
var arcs = vis.selectAll("g.slice")
    .data(pie)
    .enter()
    .append("g")
    .attr("class", "slice");


arcs.append("path")
    //.attr("fill", function(d, i){ return color(i); })
    //.attr("fill", "url(#svgbg)")
    .attr("fill","#336799")
    .attr("d", function (d) { return arc(d); })
    .attr("stroke", "#fff");

// add the text
arcs.append("text").attr("transform", function (d) {
    d.innerRadius = 0;
    d.outerRadius = r;
    d.angle = (d.startAngle + d.endAngle) / 2;
    return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius - 50) + ")";
})
    .attr("text-anchor", "end")
    .text(function (d, i) {
        return data[i].label;
    });

container.on("click", spin);


function spin(d) {

    container.on("click", null);
  
    var slices = $('path').attr('fill','#336799')
    
    var ps = 360 / data.length,
        pieslice = Math.round(1440 / data.length),
        rng = Math.floor((Math.random() * 1440) + 360);

    rotation = (Math.round(rng / ps) * ps);

    picked = Math.round(data.length - (rotation % 360) / ps);
    picked = picked >= data.length ? (picked % data.length) : picked;


    if (oldpick.indexOf(picked) !== -1) {
        d3.select(this).call(spin);
        return;
    } else {
        oldpick.push(picked);
    }

    rotation += 90 - Math.round(ps / 2);

    vis.transition()
        .duration(3000)
        .attrTween("transform", rotTween)
        .each("end", function () {

            //mark question as seen
            d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                .attr("fill", "#cbac76");

            d3.select("#awardresult h5")
                .text("Let's start with " + data[picked].award + "!");

            oldrotation = rotation;

            container.on("click", spin);
        });

              /* Get the result value from object "data" */
   console.log(data[picked].value);
         axios.post('{{URL::to('spin_inbox')}}', {
             amount: data[picked].value,
         }).then(response => {
             console.log('spin saved');
         }).catch((error) => {
         });


}

//make arrow
container.append("g")
    //.attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h / 2) + padding.top) + ")")
    .attr("transform", "translate(30, -25)")
    .append("path")
    //.attr("d", "M-" + (r * .15) + ",0L0," + (r * .05) + "L0,-" + (r * .05) + "Z")
    .attr("d","M50 25L25 25L25 10z")
    //<path d="M100 50L25 93.3L25 6.7z" fill="#ff0080"/>
    .style({ "fill": "white" });
container.append("g")
    //.attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h / 2) + padding.top) + ")")
    .attr("transform", "translate(30, -25)")
    .append("path")
    //.attr("d", "M-" + (r * .15) + ",0L0," + (r * .05) + "L0,-" + (r * .05) + "Z")
    .attr("d","M50 25L25 40L25 25z")
    //<path d="M100 50L25 93.3L25 6.7z" fill="#ff0080"/>
    .style({ "fill": "#DDDFDC" });

//draw spin circle
container.append("circle")
    .attr("cx", 0)
    .attr("cy", 0)
    .attr("r", 60)
    .style({ "fill": "white", "cursor": "pointer" });

//spin text
container.append("text")
    .attr("x", 0)
    .attr("y", 12)
    .attr("text-anchor", "middle")
    .attr("class", "centerspin")
    .text("START")
    .style({ "font-weight": "bold", "font-size": "24px" });

container.append("circle")
    .attr("cx", 0)
    .attr("cy", 0)
    .attr("r", 50)
    .style({ "stroke":"grey","stroke-width":"3px","fill": "transparent", "cursor": "pointer" });


function rotTween(to) {
    var i = d3.interpolate(oldrotation % 360, rotation);
    return function (t) {
        return "rotate(" + i(t) + ")";
    };
}


function getRandomNumbers() {
    var array = new Uint16Array(1000);
    var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);

    if (window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function") {
        window.crypto.getRandomValues(array);
        console.log("works");
    } else {
        //no support for crypto, get crappy random numbers
        for (var i = 0; i < 1000; i++) {
            array[i] = Math.floor(Math.random() * 100000) + 1;
        }
    }

    return array;
}

    </script>
@endsection
