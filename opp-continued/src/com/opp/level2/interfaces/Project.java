package com.opp.level2.interfaces;

public class Project {

	interface Test {
		void nothing();

		default void nothing1() {

		}
	}

	class Class1 implements Test {

		@Override
		public void nothing() {
			// TODO Auto-generated method stub

		}
	}

	class Class2 implements Test {

		@Override
		public void nothing() {
			// TODO Auto-generated method stub

		}
	}

	public static void main(String[] args) {
		ComplexAlg algorithm = new RealAlg();
		System.out.println(algorithm.complexAlg(10, 20));

	}

}
