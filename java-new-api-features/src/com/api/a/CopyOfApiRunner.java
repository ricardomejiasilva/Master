package com.api.a;

import java.util.ArrayList;
import java.util.List;

public class CopyOfApiRunner {

	public static void main(String[] args) {
		List<String> names = new ArrayList<String>();
		names.add("ranga");
		names.add("Jon");
		names.add("ravi");
		names.add("rangoo");

		List<String> copyOfNames = List.copyOf(names);

		doNotChange(copyOfNames);
		System.out.println(copyOfNames);

	}

	private static void doNotChange(List<String> names) {
		names.add("Should not be allowed");

	}

}
