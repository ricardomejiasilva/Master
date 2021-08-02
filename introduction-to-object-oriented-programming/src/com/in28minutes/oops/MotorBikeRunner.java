package com.in28minutes.oops;

public class MotorBikeRunner {

	public static void main(String[] args) {
		MotorBike ducati = new MotorBike(100);
		MotorBike honda = new MotorBike(200);
		MotorBike somethingElse = new MotorBike();

		System.out.println(ducati.getSpeed());

		ducati.start();
		honda.start();

		ducati.setSpeed(100);

		ducati.increaseSpeed(200);
		ducati.decreaseSpeed(400);
		System.out.println(ducati.getSpeed());

//		honda.setSpeed(80);
//		System.out.println(honda.getSpeed());


	}

}
