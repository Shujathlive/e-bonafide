
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
doc = new jsPDF();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function buildPDF(data){
	console.log(data);
if(data.cert == 'TC'){
doc.setTextColor(255, 0, 0)
doc.setFontSize(16)
doc.text(18, 30, 'Faculty of Engineering and Technology')

doc.setTextColor(0, 0, 180)
doc.setFontSize(10)
doc.text(34, 36, 'SRM NAGAR KATTANKULATHUR - 603203')

doc.text(34, 41, 'KANCHEEPURAM DISTRCT, TAMIL NADU')
// Logo of SRM

// doc.addImage(imgData, 'JPEG', 145, 18, 50, 30)

doc.setLineWidth(0.7)
doc.rect(55, 52, 100, 20)

doc.setLineWidth(0.3)
doc.rect(57, 54, 96, 16)

doc.setTextColor(255, 0, 0)

doc.setFontSize(20)
doc.text(61, 65, 'TRANSFER CERTIFICATE')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 85, 'Register No.')
doc.setTextColor(100)
doc.text(50, 85, data.arr[2])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(140, 85, 'TC No.')
doc.setTextColor(100)
doc.text(160, 85, '1011310443')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 95, '01.')
doc.text(30, 95, 'Name of the Student')
doc.setTextColor(100)
doc.text(115, 95, ':')
doc.text(120, 95, data.arr[0])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 105, '02.')
doc.text(30, 105, 'Name of the Father')
doc.setTextColor(100)
doc.text(115, 105, ':')
doc.text(120, 105, data.arr[9])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 115, '03.')
doc.text(30, 115, 'Name of the Mother')
doc.setTextColor(100)
doc.text(115, 115, ':')
doc.text(120, 115, data.arr[10])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 125, '04.')
doc.text(30, 125, 'Sex')
doc.setTextColor(100)
doc.text(115, 125, ':')
doc.text(120, 125, data.arr[3])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 135, '05.')
doc.text(30, 135, 'Date of Birth')
doc.setTextColor(100)
doc.text(115, 135, ':')
doc.text(120, 135, data.arr[1])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 145, '06.')
doc.text(30, 145, 'Nationality & Religion')
doc.setTextColor(100)
doc.text(115, 145, ':')
doc.text(120, 145, data.arr[11]+' & '+data.arr[12])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 155, '07.')
doc.text(30, 155, 'Date of Admission')
doc.setTextColor(100)
doc.text(115, 155, ':')
doc.text(120, 155, 'SHUJAATULLAH KHAN')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 165, '08.')
doc.text(30, 165, 'Degree, Branch and')
doc.text(30, 171, 'Semester in which the student')
doc.text(30, 177, 'was studying at the time ')
doc.text(30, 183, 'of leaving')
doc.setTextColor(100)
doc.text(115, 165, ':')
doc.text(120, 165, 'SHUJAATULLAH KHAN')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 193, '09.')
doc.text(30, 193, 'Medium of Instruction')
doc.setTextColor(100)
doc.text(115, 193, ':')
doc.text(120, 193, 'SHUJAATULLAH KHAN')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 203, '10.')
doc.text(30, 203, 'Whether qualified for')
doc.text(30, 209, 'promotion to a higher class')
doc.setTextColor(100)
doc.text(115, 203, ':')
doc.text(120, 203, 'SHUJAATULLAH KHAN')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 219, '11.')
doc.text(30, 219, 'Last date on which the student')
doc.text(30, 225, 'attended the college')
doc.setTextColor(100)
doc.text(115, 219, ':')
doc.text(120, 219, 'SHUJAATULLAH KHAN')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 235, '12.')
doc.text(30, 235, 'Transfer certificate issued on')
doc.setTextColor(100)
doc.text(115, 235, ':')
doc.text(120, 235, 'SHUJAATULLAH KHAN')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 245, '13.')
doc.text(30, 245, 'Conduct and Character')
doc.setTextColor(100)
doc.text(115, 245, ':')
doc.text(120, 245, 'SHUJAATULLAH KHAN')

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 255, '14.')
doc.text(30, 255, 'Aadhar Card Number')
doc.setTextColor(100)
doc.text(115, 255, ':')
doc.text(120, 255, 'SHUJAATULLAH KHAN')


doc.setTextColor(0, 0, 190)
doc.text(160, 285, 'DIRECTOR')

//doc.addImage(imgData, 'JPEG', 30, 260, 30, 30)
}
else{
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
if(data.arr[2]=='Male'){
	sex= 'Mr.';
}
else{
	sex= 'Ms.';
}
doc.text(86, 120, sex +' '+ data.arr[0] + ',')

doc.setFontType('normal')
doc.text(166, 120, '(Register No.')
doc.text(16.5, 130, data.arr[1] + '),')
doc.text(62, 130, 'was  admitted  in  ')
doc.setFontSize(12)
doc.text(100, 130, ' '+ data.arr[3] + ', ' + data.arr[6])
doc.setFontSize(13)

///////////YEAR SPLIT/////////

var dur = data.arr[5];

var yr = dur.split("-");

yr[0] = yr[0].trim();

//////////////////////////////

doc.text(16.5, 140, 'in  ' + 'July' + ' ' + yr[1]+ ' ' + '(Full Time)'+'. He  has  undergone  Four  Years  '+ data.arr[6] +'.  course  during  the ')
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
}