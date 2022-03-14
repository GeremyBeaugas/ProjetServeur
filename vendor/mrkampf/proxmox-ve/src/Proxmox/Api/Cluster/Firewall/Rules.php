<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Proxmox\Api\Cluster\Firewall;

use Proxmox\Api\Cluster\Firewall\Rules\Pos;
use Proxmox\Helper\PVEPathClassBase;
use Proxmox\PVE;

/**
 * Class Rules
 * @package Proxmox\Api\Cluster\Firewall
 */
class Rules extends PVEPathClassBase
{

    /**
     * Rules constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'rules/');
    }

    /**
     * Get single rule data.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/rules/{pos}
     * @param string $pos
     * @return Pos
     */
    public function pos(string $pos): Pos
    {
        return new Pos($this->getPve(), $this->getPathAdditional() . $pos . '/');
    }

    /**
     * List rules.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/rules
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

    /**
     * Create new rule.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/firewall/rules
     * @param $params array
     * @return array|null
     */
    public function post(array $params = []): ?array
    {
        return $this->getPve()->getApi()->post($this->getPathAdditional(), $params);
    }

}