student = {'name' : 'John', 'age' : 25, 'courses' :['Math','Compsci']}

print(student['name'])
#you can use this to avoid the error id=f ther is no key we call
print(student.get('phone')) # it will print None by default
print(student.get('phone'), 'Not Found')

#you can update and adding elements , key, value by this way
student['phone'] = '55555-5555'
student['name'] = 'Jane'

#or you can use this 
student.update({'name': 'Jane', 'age':26, 'phone': '5555-5555'})
print(student)

