createGradient($('svg')[0],'MyGradient',[
  {offset:'5%', 'stop-color':'#f60'},
  {offset:'95%','stop-color':'#ff6'},
]);
$('svg path').attr('fill','url(#MyGradient)');

// svg:   the owning <svg> element
// id:    an id="..." attribute for the gradient
// stops: an array of objects with <stop> attributes
function createGradient(svg,id,stops){
  var svgNS = svg.namespaceURI;
  var grad  = document.createElementNS(svgNS,'linearGradient');
  grad.setAttribute('id',id);
  grad.setAttribute('x1', '0%');
  grad.setAttribute('x2', '0%');
  grad.setAttribute('y1', '0%');
  grad.setAttribute('y1', '100%');
  for (var i=0;i<stops.length;i++){
    var attrs = stops[i];
    var stop = document.createElementNS(svgNS,'stop');
    for (var attr in attrs){
      if (attrs.hasOwnProperty(attr)) stop.setAttribute(attr,attrs[attr]);
    }
    grad.appendChild(stop);
  }

  var defs = svg.querySelector('defs') ||
      svg.insertBefore( document.createElementNS(svgNS,'defs'), svg.firstChild);
  return defs.appendChild(grad);
}