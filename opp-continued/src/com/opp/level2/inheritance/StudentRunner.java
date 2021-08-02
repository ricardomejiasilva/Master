package com.opp.level2.inheritance;

import java.math.BigDecimal;

public class StudentRunner {

	public static void main(String[] args) {
//		Student student = new Student();
//		student.setName("ranga");
//		student.setEmail("123@gmail.com");

//		Person person = new Person();
//		String value = person.toString();
//		System.out.println(value);
//		System.out.println(person);

		Employee employee = new Employee("ranga", "Programer");
		employee.setEmail("Ranga@gmail.com");
		employee.setPhoneNumber("123-456-7890");
		employee.setGrade('A');
		employee.setTitle("Programer");
		employee.setSalary(new BigDecimal(5432.5));

		System.out.println(employee);
	}

}
