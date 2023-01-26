var canvas = document.querySelector('canvas');
canvas.width=1000;
canvas.height=500;

var c = canvas.getContext('2d');

c.beginPath();
c.moveTo(60,300);
c.lineTo(60,100)
c.stroke();

c.fillRect(100,100,28,28);
c.fillStyle = 'grey';
c.fillRect(90,100,28,28);



