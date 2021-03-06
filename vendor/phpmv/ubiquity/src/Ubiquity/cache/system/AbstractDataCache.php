<?php

/**
 * Cache systems
 */
namespace Ubiquity\cache\system;

use Ubiquity\exceptions\CacheException;

/**
 * This class is responsible for storing Arrays in PHP files.
 * Inspired by (c) Rasmus Schultz <rasmus@mindplay.dk>
 * <https://github.com/mindplay-dk/php-annotations>
 * Ubiquity\cache\system$AbstractDataCache
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.1
 *
 */
abstract class AbstractDataCache {
	protected $_root;
	protected $postfix;

	public function __construct($root, $postfix = '') {
		$this->setRoot ( $root );
		$this->postfix = $postfix;
	}

	public function init() {
	}

	/**
	 * Check if annotation-data for the key has been stored.
	 *
	 * @param string $key cache key
	 * @return boolean true if data with the given key has been stored; otherwise false
	 */
	abstract public function exists($key);

	public function expired($key, $duration) {
		if ($this->exists ( $key )) {
			if (\is_int ( $duration ) && $duration !== 0) {
				return \time () - $this->getTimestamp ( $key ) > $duration;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}

	/**
	 * Caches the given data with the given key.
	 *
	 * @param string $key cache key
	 * @param mixed $code the source-code to be cached
	 * @param string $tag the item tag
	 * @throws CacheException
	 */
	abstract public function store($key, $code, $tag = null);

	public function getRoot() {
		return $this->_root;
	}

	/**
	 *
	 * @param mixed $_root
	 */
	public function setRoot($_root) {
		$this->_root = $_root;
	}

	/**
	 * Fetches data stored for the given key.
	 *
	 * @param string $key cache key
	 * @return mixed the cached data
	 */
	abstract public function fetch($key);

	/**
	 * return data stored for the given key.
	 *
	 * @param string $key cache key
	 * @return mixed the cached data
	 */
	abstract public function file_get_contents($key);

	/**
	 * Returns the timestamp of the last cache update for the given key.
	 *
	 * @param string $key cache key
	 * @return boolean|int unix timestamp
	 */
	abstract public function getTimestamp($key);

	/**
	 *
	 * @param string $key
	 */
	abstract public function remove($key);

	/**
	 * Clears all cache entries
	 */
	abstract public function clear();

	abstract public function getCacheFiles($type);

	abstract public function clearCache($type);

	public function getCacheInfo() {
		return "Cache system is an instance of <b>" . \get_class ( $this ) . "</b>.";
	}

	abstract public function getEntryKey($key);
}
