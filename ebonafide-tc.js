
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
doc = new jsPDF();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function buildPDF(data){
	console.log(data);

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
doc.text(50, 85, data[2])

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
doc.text(120, 95, data[0])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 105, '02.')
doc.text(30, 105, 'Name of the Father')
doc.setTextColor(100)
doc.text(115, 105, ':')
doc.text(120, 105, data[9])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 115, '03.')
doc.text(30, 115, 'Name of the Mother')
doc.setTextColor(100)
doc.text(115, 115, ':')
doc.text(120, 115, data[10])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 125, '04.')
doc.text(30, 125, 'Sex')
doc.setTextColor(100)
doc.text(115, 125, ':')
doc.text(120, 125, data[3])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 135, '05.')
doc.text(30, 135, 'Date of Birth')
doc.setTextColor(100)
doc.text(115, 135, ':')
doc.text(120, 135, data[1])

doc.setTextColor(0, 0, 180)
doc.setFontSize(14)
doc.text(18, 145, '06.')
doc.text(30, 145, 'Nationality & Religion')
doc.setTextColor(100)
doc.text(115, 145, ':')
doc.text(120, 145, data[11]+' & '+data[12])

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