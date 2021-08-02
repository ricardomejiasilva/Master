package com.opp.level2.inheritance;

import java.math.BigDecimal;

public class Employee extends Person {

	private String title;
	private String employer;
	private char grade;
	private BigDecimal salary;

	public Employee(String name, String title) {
		super(name);
		this.title = title;
		System.out.println("Employee constructor");
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getEmployer() {
		return employer;
	}

	public void setEmployer(String employer) {
		this.employer = employer;
	}

	public char getGrade() {
		return grade;
	}

	public void setGrade(char grade) {
		this.grade = grade;
	}

	public BigDecimal getSalary() {
		return salary;
	}

	public void setSalary(BigDecimal salary) {
		this.salary = salary;
	}

	@Override
	public String toString() {
		return super.toString() + "#" + title + '#' + employer + "#" + grade;
	}

}
