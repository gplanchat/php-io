<?php
/**
 * This file is part of Gplanchat\Io.
 *
 * Gplanchat\Io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Gplanchat\Io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Gplanchat\Io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

namespace Gplanchat\Io\Net\Tcp;

use Gplanchat\EventManager\CallbackHandlerInterface;
use Gplanchat\EventManager\EventEmitterInterface;
use Gplanchat\EventManager\EventInterface;
use Gplanchat\Io\Exception\MissingDependecyException;

trait ClientDecoratorTrait
{
    private $decorated = null;

    /**
     * @return ClientInterface
     */
    public function getDecoratedClient()
    {
        if ($this->decorated === null) {
            throw new MissingDependecyException('No decorated client was defined.');
        }
        return $this->decorated;
    }

    /**
     * @param ClientInterface $decorated
     * @return ClientDecoratorInterface
     */
    public function setDecoratedClient(ClientInterface $decorated)
    {
        $this->decorated = $decorated;

        return $this;
    }

    /**
     * @param string|array $eventNameList
     * @param callable $listener
     * @param int|null $priority
     * @return EventEmitterInterface
     */
    public function on($eventNameList, callable $listener, $priority = null)
    {
        $this->getDecoratedClient()->on($eventNameList, $listener, $priority);

        return $this;
    }

    /**
     * @param string|array $eventNameList
     * @param callable $listener
     * @param int|null $priority
     * @return EventEmitterInterface
     */
    public function once($eventNameList, callable $listener, $priority = null)
    {
        $this->getDecoratedClient()->once($eventNameList, $listener, $priority);

        return $this;
    }

    /**
     * @abstract
     * @param string|array $eventNameList
     * @param EventEmitterInterface $callback
     * @return EventEmitterInterface
     */
    public function removeListener($eventNameList, EventEmitterInterface $callback)
    {
        $this->getDecoratedClient()->removeListener($eventNameList, $callback);

        return $this;
    }

    /**
     * @abstract
     * @param string|array $eventNameList
     * @return EventEmitterInterface
     */
    public function removeAllListeners($eventNameList)
    {
        $this->getDecoratedClient()->removeAllListeners($eventNameList);

        return $this;
    }

    /**
     * @abstract
     * @param string|array $eventNameList
     * @return array
     */
    public function getListeners($eventNameList)
    {
        $this->getDecoratedClient()->getListeners($eventNameList);

        return $this;
    }

    /**
     * @abstract
     * @param EventInterface $event
     * @param array $params
     * @return EventEmitterInterface
     */
    public function emit(EventInterface $event, array $params = [])
    {
        $this->getDecoratedClient()->emit($event, $params);

        return $this;
    }
}
