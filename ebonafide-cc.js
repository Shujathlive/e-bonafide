///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
doc = new jsPDF();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function buildPDF(data){
	console.log(data);

doc.setFontSize(16)
doc.text(20, 40, 'Dr.C.Muthamizhchelvan, Ph.D.,')
doc.text(20, 48, 'Director (Engg & Tech)')

doc.setFontSize(20)
doc.setFontType('bold')
doc.setLineWidth(0.6)
doc.rect(36, 70, 144, 24)
doc.setLineWidth(1.5)
doc.rect(38, 72, 140, 20)
doc.setLineWidth(0.6)
doc.rect(40, 74, 136, 16)
doc.text(44, 84, 'COURSE COMPLETION CERTIFICATE')

doc.setFontSize(13)
doc.setFont('helvetica')
doc.setFontType('normal')
doc.text(30, 120, 'This  is  to  certify  that')

doc.setFontType('bold')
if(data[2]=='Male'){
	sex= 'Mr.';
}
else{
	sex= 'Ms.';
}
doc.text(86, 120, sex +' '+ data[0] + ',')

doc.setFontType('normal')
doc.text(166, 120, '(Register No.')
doc.text(16.5, 130, data[1] + '),')
doc.text(62, 130, 'was  admitted  in  ')
doc.setFontSize(12)
doc.text(100, 130, ' '+ data[3] + ', ' + data[6])
doc.setFontSize(13)

///////////YEAR SPLIT/////////

var dur = data[5];

var yr = dur.split("-");

yr[0] = yr[0].trim();

//////////////////////////////

doc.text(16.5, 140, 'in  ' + 'July' + ' ' + yr[1]+ ' ' + '(Full Time)'+'. He  has  undergone  Four  Years  '+ data[6] +'.  course  during  the ')
doc.text(16.5, 150, 'academic year ' + yr[0] + ' - '+ yr[1] + '. He  has  completed  the  prescribed  course  of  instruction')
doc.text(16.5, 160, 'and  will  be  appearing  for  the  final  semester  University  Examinations  in   ' + 'May'+ '`'+'17.')
doc.text(16.5, 170, 'His  final  results  of  University  Examination  will  be  announced  in  '+'July'+' '+'17'+'.')

doc.text(30, 180, 'His  Conduct and Character are good.')
doc.setFontType('bold')
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

doc.text(16.5, 195, 'Date: ' )
doc.setFontType('normal')
doc.text(30, 195, today)/////////////////////////////////////////////


doc.setFontSize(16)
doc.text(135, 215, 'Director (Engg & Tech)')

//var imgData = 'XOXO'
//doc.addImage(imgData, 'JPEG', 30, 210, 40, 40)

}