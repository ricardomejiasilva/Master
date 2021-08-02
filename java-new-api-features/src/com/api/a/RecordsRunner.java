package com.api.a;

public class RecordsRunner {

	public record Person(String name, String email, String phoneNumber) {
	}

	public static void main(String[] args) {
		Person person = new Person("ranga", "rams@live.com", "9415366093");
		Person person1 = new Person("ranga", "rams@live.com", "9415366093");
		Person person2 = new Person("ranga", "rams@live.com", "9415366093");
		System.out.println(person.equals(person1));
		System.out.println(person.equals(person2));

	}

}
