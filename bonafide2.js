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

doc.setLineWidth(0.2)
doc.rect(8, 8, 194, 40)

doc.setLineWidth(0.2)
doc.rect(8, 8, 194, 40)

doc.setLineWidth(0.2)
doc.rect(8, 48, 194, 10)

var imgData = 'data:image/png;base64,'+data[60];
doc.addImage(imgData, 'JPEG', 13, 13, 30, 30)

doc.setFont('helvetica')
doc.setFontType('bold')
doc.setFontSize(26)
doc.text(86, 20, data[0])
doc.setFont('helvetica')
doc.setFontSize(18)
doc.text(68, 28, data[62])
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
doc.text(165, 66, data[63])
doc.setFont('helvetica')
doc.setFontType('bold')
doc.setFontSize(22)
doc.text(58, 82, 'BONAFIDE CERTIFICATE')
doc.setLineWidth(1)
doc.line(58, 84, 152, 84)
doc.setFont('times')
doc.setFontType('bolditalic')
doc.setFontSize(13.8)
doc.text(18, 92, 'This is certified that the under mentioned student is a bonafide student of SRM University ')

doc.text(18, 99.5, 'Student Name')
doc.setFontType('normal')
doc.text(70, 99.5, ':')
doc.setFontType('bold')
doc.text(80, 99.5, data[14])

doc.text(18, 104.5, 'Date of Birth')
doc.setFontType('normal')
doc.text(70, 104.5, ':')
doc.setFontType('bold')
doc.text(80, 104.5, data[15])

doc.setFontType('italic')
doc.text(18, 109.5, 'Reg Number')
doc.setFontType('normal')
doc.text(70, 109.5, ':')
doc.setFontType('normal')
doc.text(80, 109.5, data[16])

doc.setFontType('italic')
doc.text(18, 114.5, 'Gender')
doc.setFontType('normal')
doc.text(70, 114.5, ':')
doc.setFontType('normal')
doc.text(80, 114.5, data[17])

doc.setFontType('italic')
doc.text(18, 119.5, 'Branch')
doc.setFontType('normal')
doc.text(70, 119.5, ':')
doc.setFontType('bold')
doc.text(80, 119.5, data[18])

doc.setFontType('italic')
doc.text(18, 124.5, 'Year of Studying')
doc.setFontType('normal')
doc.text(70, 124.5, ':')
doc.setFontType('normal')
doc.text(80, 124.5, data[19])

doc.setFontType('italic')
doc.text(18, 129.5, 'Academic Year')
doc.setFontType('normal')
doc.text(70, 129.5, ':')
doc.setFontType('normal')
doc.text(80, 129.5, data[20])

doc.setFontType('italic')
doc.text(18, 134.5, 'Degree')
doc.setFontType('normal')
doc.text(70, 134.5, ':')
doc.setFontType('bold')
doc.text(80, 134.5, data[21])

doc.setFontType('italic')
doc.text(18, 139.5, 'Duration of the Course')
doc.setFontType('normal')
doc.text(70, 139.5, ':')
doc.setFontType('normal')
doc.text(80, 139.5, data[22])

doc.setFontType('italic')
doc.text(18, 144.5, 'Purpose')
doc.setFontType('normal')
doc.text(70, 144.5, ':')
doc.setFontType('normal')


///////////////PURPOSE/////////////////

doc.text(80, 144.5,data[59])
	
///////////////////////////////////////


doc.setLineWidth(0.4)
doc.rect(8, 154, 194, 71)

doc.setLineWidth(0.4)
doc.rect(8, 154, 40, 71)
doc.rect(48, 154, 30, 71)
doc.rect(78, 154, 30, 71)
doc.rect(108, 154, 30, 71)
doc.rect(138, 154, 30, 71)

doc.rect(48, 154, 120, 8.5)
doc.rect(8, 154, 194, 16)
doc.rect(8, 154, 194, 24)
doc.rect(8, 154, 194, 32)
doc.rect(8, 154, 194, 40)
doc.rect(8, 154, 194, 48)
doc.rect(8, 154, 194, 56)
doc.rect(8, 154, 194, 64)
//doc.rect(8, 184, 130, 72)

doc.setFontSize(15)
doc.setFontType('bolditalic')
doc.text(15, 164, 'Particulars')
doc.text(178, 164, 'Total')
doc.setFontSize(13)
doc.text(57, 160, 'I Year')
doc.text(55, 168, '2015-16')
doc.text(87, 160, 'II Year')
doc.text(85, 168, '2016-17')
doc.text(117, 160, 'III Year')
doc.text(115, 168, '2017-18')
doc.text(147, 160, 'IV Year')
doc.text(145, 168, '2018-19')

doc.setFontType('normal')
doc.setFontSize(11.5)

doc.text(10, 175, 'Tutition Fee')
doc.text(53, 175, data[23])
doc.text(83, 175, data[24])
doc.text(113, 175, data[25])
doc.text(143, 175, data[26])
doc.setFontType('bolditalic')
doc.text(173, 175, data[27])
//doc.text(203, 185, 'XXXXXXX')

doc.setFontType('normal')
doc.text(10, 184, 'Lab Fee')
doc.text(53, 184, data[28])
doc.text(83, 184, data[29])
doc.text(113, 184, data[30])
doc.text(143, 184, data[31])
doc.setFontType('bolditalic')
doc.text(173, 184, data[32])
//doc.text(203, 194, 'XXXXXXX')

doc.setFontType('normal')
doc.text(10, 192, 'Computer Lab Fee')
doc.text(53, 192, data[33])
doc.text(83, 192, data[34])
doc.text(113, 192, data[35])
doc.text(143, 192, data[36])
doc.setFontType('bolditalic')
doc.text(173, 192, data[37])
//doc.text(203, 202, 'XXXXXXX')

doc.setFontType('normal')
doc.text(10, 199, 'Library Fee')
doc.text(53, 199, data[38])
doc.text(83, 199, data[39])
doc.text(113, 199, data[40])
doc.text(143, 199, data[41])
doc.setFontType('bolditalic')
doc.text(173, 199, data[42])
//doc.text(203, 209, 'XXXXXXX')

doc.setFontType('normal')
doc.text(10, 207, 'Sports and Games Fee')
doc.text(83, 207, data[43])
doc.text(53, 207, data[44])
doc.text(113, 207, data[45])
doc.text(143, 207, data[46])
doc.setFontType('bolditalic')
doc.text(173, 207, data[47])
//doc.text(203, 217, 'XXXXXXX')

doc.setFontType('normal')
doc.text(10, 215, 'Development Fee')
doc.text(53, 215, data[48])
doc.text(83, 215, data[49])
doc.text(113, 215, data[50])
doc.text(143, 215, data[51])
doc.setFontType('bolditalic')
doc.text(173, 215, data[52])
//doc.text(203, 225, 'XXXXXXX')

doc.setFontType('bolditalic')
doc.text(10, 223, 'Annual Course Fee')
doc.text(53, 223, data[53])
doc.text(83, 223, data[54])
doc.text(113, 223, data[55])
doc.text(143, 223, data[56])
doc.text(173, 223, data[57])
//doc.text(203, 233, 'XXXXXXX')


doc.rect(8, 230, 130, 7)
doc.rect(8, 230, 70, 7)
doc.rect(8, 230, 40, 7)
doc.text(20, 235, 'Grand Total:')
doc.text(70, 235, 'Rs.')
doc.text(80, 235, data[58])
doc.setFontType('bolditalic')
doc.setFontSize(10)
doc.text(55, 284, '*This certificate is digitally signed and does not require a signature.')


//////////QR TO BASE64///////////////////////////////
function toDataUrl(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
            callback(reader.result);
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
}

//QRcode generator URL
var imageUrl ='http://chart.apis.google.com/chart?cht=qr&chs=100x100&choe=UTF-8&chld=H&chl=http://';

//b64 contains the base64 url of QR code
toDataUrl(imageUrl, function(myBase64) {
    doc.addImage(myBase64, 'JPEG', 20, 240) 	// myBase64 is the base64 string
});
 	///////////////////////////////////////////////////

	
var imgData = 'data:image/png;base64,'+data[61];
doc.addImage(imgData, 'JPEG', 155, 240, 30, 30)
	
	
doc.setFontType('bold')
doc.text(150, 275, data[12])


}

