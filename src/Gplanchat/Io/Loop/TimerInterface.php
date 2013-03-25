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

namespace Gplanchat\Io\Loop;

interface TimerInterface
{
    /**
     * @param LoopInterface $loop
     */
    public function __construct(LoopInterface $loop);

    /**
     * @param int $timeout
     * @param callable $callback
     * @return TimerInterface
     */
    public function timeout($timeout, callable $callback);

    /**
     * @param int $timeout
     * @param callable $callback
     * @return TimerInterface
     */
    public function interval($timeout, callable $callback);

    /**
     * @param int $startTimeout
     * @param int $repeatTimeout
     * @param callable $callback
     * @return TimerInterface
     */
    public function repeater($startTimeout, $repeatTimeout, callable $callback);

    /**
     * @return TimerInterface
     */
    public function repeat();

    /**
     * @param int $timeout
     * @return TimerInterface
     */
    public function setRepeatTimeout($timeout);

    /**
     * @return TimerInterface
     */
    public function stop();
}
