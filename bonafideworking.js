
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
doc = new jsPDF();

var purpose = '';

$('input[name=optradio]').change(function(){
purpose = $( 'input[name=optradio]:checked' ).val();
console.log(purpose);
 $.ajax({
            type:"POST",
            url:"process.php",
            data:{pup:purpose},
			dataType: "json" ,
            success:function(data){
               buildPDF(data);		
				console.log(data);
				},
				error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }
        });
});

	

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function buildPDF(data){

doc.setLineWidth(1.5)
doc.rect(5, 5, 200, 287)

doc.setLineWidth(0.5)
doc.rect(8, 8, 194, 280)

doc.setLineWidth(0.2)
doc.rect(8, 8, 40, 40)

var imgData = 'data:image/png;base64,'+data[25];
doc.addImage(imgData, 'JPEG', 13, 13, 30, 30)

doc.setLineWidth(0.2)
doc.rect(8, 8, 194, 40)

doc.setLineWidth(0.2)
doc.rect(8, 8, 194, 40)

doc.setLineWidth(0.2)
doc.rect(8, 48, 194, 10)
console.log(data[26]);
doc.setFont('helvetica')
doc.setFontType('bold')
doc.setFontSize(26)
doc.text(86, 20, data[0])
doc.setFont('helvetica')
doc.setFontSize(18)
doc.text(68, 28, data[27])
doc.setFont('helvetica')
doc.setFontType('normal')
doc.setFontSize(12)
doc.text(59, 34, data[1]+' - '+data[2]+', '+data[3]+' District,'+ data[4]+', '+data[5])
doc.text(56, 39, 'Ph.: '+data[6]+', '+data[7]+', Fax: '+data[8])
doc.text(64, 44, 'E-mail: '+data[9]+', Website: '+data[10])
doc.setFontSize(11.2)
doc.setFontType('bold')
doc.text(10.5, 54.5, data[11])
doc.setFontType('bold')
doc.setFontSize(13)
doc.text(10.5, 66, data[13])
doc.setFontSize(12)
doc.setFontType('normal')
doc.text(10.5, 72, data[12])

/////////////////////  DATE  /////////////////
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = dd + '/' + mm + '/' + yyyy;

doc.setFontSize(12)
doc.setFontType('normal')
doc.text(160, 72, 'Date :')
doc.text(175, 72, today)
/////////////////////////////////////////////


doc.setFontType('normal')
doc.setFontSize(13)
doc.text(130, 66, 'Certificate No.:')
doc.text(165, 66, data[23])
doc.setFont('helvetica')
doc.setFontType('bold')
doc.setFontSize(22)
doc.text(58, 100, 'BONAFIDE CERTIFICATE')
doc.setLineWidth(1)
doc.line(58, 102, 152, 102)
doc.setFont('times')
doc.setFontType('italic')
doc.setFontSize(13.8)
doc.text(18, 115, 'This is certified that the under mentioned student is a bonafide student of SRM University ')

doc.text(18, 130, 'Student Name')
doc.setFontType('normal')
doc.text(70, 130, ':')
doc.setFontType('bold')
doc.text(80, 130, data[14]+' ['+data[15]+']')

doc.setFontType('italic')
doc.text(18, 140, 'Reg Number')
doc.setFontType('normal')
doc.text(70, 140, ':')
doc.setFontType('normal')
doc.text(80, 140, data[16])

doc.setFontType('italic')
doc.text(18, 150, 'Gender')
doc.setFontType('normal')
doc.text(70, 150, ':')
doc.setFontType('normal')
doc.text(80, 150, data[17])

doc.setFontType('italic')
doc.text(18, 160, 'Branch')
doc.setFontType('normal')
doc.text(70, 160, ':')
doc.setFontType('bold')
doc.text(80, 160, data[18])

doc.setFontType('italic')
doc.text(18, 170, 'Year of Studying')
doc.setFontType('normal')
doc.text(70, 170, ':')
doc.setFontType('normal')
doc.text(80, 170, data[19])

doc.setFontType('italic')
doc.text(18, 180, 'Academic Year')
doc.setFontType('normal')
doc.text(70, 180, ':')
doc.setFontType('normal')
doc.text(80, 180, data[20])

doc.setFontType('italic')
doc.text(18, 190, 'Degree')
doc.setFontType('normal')
doc.text(70, 190, ':')
doc.setFontType('bold')
doc.text(80, 190, data[21])

doc.setFontType('italic')
doc.text(18, 200, 'Duration of the Course')
doc.setFontType('normal')
doc.text(70, 200, ':')
doc.setFontType('normal')
doc.text(80, 200, data[22])

doc.setFontType('italic')
doc.text(18, 210, 'Purpose')
doc.setFontType('normal')
doc.text(70, 210, ':')
doc.setFontType('normal')


///////////////PURPOSE/////////////////

doc.text(80, 210,data[24])

///////////////////////////////////////


//////////QR TO BASE64///////////////////////////////
function convertImgToBase64(url, callback, outputFormat){
	var img = new Image();
	img.crossOrigin = 'Anonymous';
	img.onload = function(){
	    var canvas = document.createElement('CANVAS');
	    var ctx = canvas.getContext('2d');
		canvas.height = this.height;
		canvas.width = this.width;
	  	ctx.drawImage(this,0,0);
	  	var dataURL = canvas.toDataURL(outputFormat || 'image/png');
	  	callback(dataURL);
	  	canvas = null; 
	};
	img.src = url;
}

//QRcode generator URL
var imageUrl ='http://chart.apis.google.com/chart?cht=qr&chs=100x100&choe=UTF-8&chld=H&chl=http://';

//b64 contains the base64 url of QR code
 convertImgToBase64(imageUrl, function(base64Img){
		doc.addImage(base64Img, 'JPEG', 20, 240)
    });
	///////////////////////////////////////////////////

var imgData = 'data:image/png;base64,'+data[26];

doc.addImage(imgData, 'JPEG', 155, 240, 30, 30)
	
	
doc.setFontType('bold')
doc.text(150, 275, 'Deputy Registrar')

}

