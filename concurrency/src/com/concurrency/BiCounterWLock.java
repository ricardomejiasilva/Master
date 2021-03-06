package com.concurrency;

import java.util.concurrent.locks.Lock;
import java.util.concurrent.locks.ReentrantLock;

public class BiCounterWLock {
	private int i = 0;
	private int j = 0;

	Lock lockForI = new ReentrantLock();
	Lock lockForJ = new ReentrantLock();

	public void incrementI() {
		// get lock
		lockForI.lock();
		i++;
		lockForI.unlock();
		// Release lock
	}

	public int getI() {
		return i;
	}

	public void incrementJ() {
		// get lock
		lockForJ.lock();
		j++;
		lockForJ.unlock();
		// Release lock
	}

	public int getJ() {
		return j;
	}

}
