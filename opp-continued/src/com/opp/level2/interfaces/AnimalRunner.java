package com.opp.level2.interfaces;

abstract class Animal {
	abstract void bark();
}

class Dog extends Animal {
	@Override
	public void bark() {
		System.out.println("woof woof");
	}
}

class Cat extends Animal {
	@Override
	public void bark() {
		System.out.println("Meow Meow");
	}
}

public class AnimalRunner {

	public static void main(String[] args) {
		Animal[] animals = { new Cat(), new Dog() };

		for (Animal animal : animals) {
			animal.bark();
		}
	}

}
