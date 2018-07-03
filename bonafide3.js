///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
doc = new jsPDF();


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function buildPDF(data){
console.log(data)
doc.setLineWidth(1.5)
doc.rect(5, 5, 200, 287)

doc.setLineWidth(0.5)
doc.rect(8, 8, 194, 280)

doc.setLineWidth(0.2)
doc.rect(8, 8, 40, 40)

var imgData = 'data:image/png;base64,'+data[30];
doc.addImage(imgData, 'JPEG', 13, 13, 30, 30)

doc.setLineWidth(0.2)
doc.rect(8, 8, 194, 40)

doc.setLineWidth(0.2)
doc.rect(8, 8, 194, 40)

doc.setLineWidth(0.2)
doc.rect(8, 48, 194, 10)


doc.setFont('helvetica')
doc.setFontType('bold')
doc.setFontSize(26)
doc.text(86, 20, data[0])
doc.setFont('helvetica')
doc.setFontSize(18)
doc.text(68, 28, data[32])
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
doc.text(173, 66, data[33])
doc.setFont('helvetica')
doc.setFontType('bold')
doc.setFontSize(22)
doc.text(58, 82, 'FEES Paid CERTIFICATE')
doc.setLineWidth(1)
doc.line(58, 84, 152, 84)
doc.setFont('times')
doc.setFontType('bolditalic')
doc.setFontSize(13.8)
doc.text(18, 92, 'Certified that the under mentioned candidate is a bonafide student of this University ')

doc.text(18, 100, 'Student Name')
doc.setFontType('normal')
doc.text(70, 100, ':')
doc.setFontType('bold')
doc.text(80, 100, data[14])

doc.text(18, 108, 'Date of Birth')
doc.setFontType('normal')
doc.text(70, 108, ':')
doc.setFontType('bold')
doc.text(80, 108, data[15])

doc.setFontType('italic')
doc.text(18, 116, 'Reg Number')
doc.setFontType('normal')
doc.text(70, 116, ':')
doc.setFontType('normal')
doc.text(80, 116, data[16])

doc.setFontType('italic')
doc.text(18, 124, 'Gender')
doc.setFontType('normal')
doc.text(70, 124, ':')
doc.setFontType('normal')
doc.text(80, 124, data[17])

doc.setFontType('italic')
doc.text(18, 132, 'Branch')
doc.setFontType('normal')
doc.text(70, 132, ':')
doc.setFontType('bold')
doc.text(80, 132, data[18])

doc.setFontType('italic')
doc.text(18, 140, 'Year of Studying')
doc.setFontType('normal')
doc.text(70, 140, ':')
doc.setFontType('normal')
doc.text(80, 140, data[19])

doc.setFontType('italic')
doc.text(18, 148, 'Academic Year')
doc.setFontType('normal')
doc.text(70, 148, ':')
doc.setFontType('normal')
doc.text(80, 148, data[20])

doc.setFontType('italic')
doc.text(18, 156, 'Degree')
doc.setFontType('normal')
doc.text(70, 156, ':')
doc.setFontType('bold')
doc.text(80, 156, data[21])

doc.setFontType('italic')
doc.text(18, 164, 'Duration of the Course')
doc.setFontType('normal')
doc.text(70, 164, ':')
doc.setFontType('normal')
doc.text(80, 164, data[22])

doc.setLineWidth(0.4)

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

//Signature	
var imgData = 'data:image/png;base64,'+data[31];
doc.addImage(imgData, 'JPEG', 155, 240, 30, 30)
/////////////////////////////////////////////////	
	
doc.setFontType('bold')
doc.text(150, 275, data[12])

doc.setFontType('bolditalic')
doc.setFontSize(10)
doc.text(55, 284, '*This certificate is digitally signed and does not require a signature.')

doc.rect(65,170,80,80)
doc.rect(65,170,50,80)
doc.rect(65,170,80,10)
doc.rect(65,180,80,10)
doc.rect(65,190,80,10)
doc.rect(65,200,80,10)
doc.rect(65,210,80,10)
doc.rect(65,220,80,10)
doc.rect(65,230,80,10)

doc.setFontType('bold')
doc.setFontSize(13)
doc.text(66, 177, 'Course Fees Particulars')
doc.text(120, 177, 'Amount')


doc.setFontType('normal')
doc.setFontSize(13)
doc.text(66, 187, 'Tuition Fee')
doc.text(66, 197, 'Lab Fee')
doc.text(66, 207, 'Computer Lab Fee')
doc.text(66, 217, 'Library Fee')
doc.text(66, 227, 'Sports & Games Fee')
doc.text(66, 237, 'Development Fee')

doc.text(120, 187, data[23])
doc.text(120, 197, data[24])
doc.text(120, 207, data[25])
doc.text(120, 217, data[26])
doc.text(120, 227, data[27])
doc.text(120, 237, data[28])


doc.setFontType('bold')
doc.text(66, 247, 'Total')
doc.text(120, 247, data[29])


}