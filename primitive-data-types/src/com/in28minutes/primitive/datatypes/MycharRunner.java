package com.in28minutes.primitive.datatypes;

public class MycharRunner {

	public static void main(String[] args) {
		MyChar myChar = new MyChar('1');
		System.out.println(myChar.isVowel());
		myChar.isConsonant();
		System.out.println(myChar.isNumber());
		System.out.println(myChar.isAlphabet());
		MyChar.printLowerCaseAlphabets();
		MyChar.printUpperCaseAlphabets();

	}

}
