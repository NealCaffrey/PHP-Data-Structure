<?php

namespace DS\LinkedList\Src;

use DS\LinkedList\Src\Node;

class LinkedList
{
    /**
     * 头结点
     * @var null
     */
	private $firstNode = NULL;

    /**
     * 尾节点
     * @var null
     */
	private $lastNode = NULL;

    /**
     * 总节点数量
     * @var null
     */
	private $totalNode = NULL;

    /**
     * 当前节点
     * @var null
     */
	private $currentNode = NULL;

    /**
     * 当前位置
     * @var null
     */
	private $currentPosition = NULL;

    /**
     * 在结尾插入新节点
     * @param string|NULL $data
     * @return bool
     */
	public function insert(string $data = NULL)
	{
	    // 获取新节点对象
		$node = new Node($data);
		// 如果头节点为空，新节点成为头节点
		if ($this->firstNode === NULL) {
		    $this->firstNode = &$node;
		    $this->lastNode = &$node;
        } else {
		    // 如果头结点不为空，在尾部插入新节点
            $currentNode = $this->lastNode;
            $currentNode->next = $node;
            $node->prev = $currentNode;
            $this->lastNode = &$node;
        }
		// 节点数量加1
		$this->totalNode++;
		return TRUE;
	}

    /**
     * 在开头插入新节点
     * @param string|NULL $data
     * @return bool
     */
	public function insertAtFirst(string $data = NULL)
    {
        $node = new Node($data);
        if ($this->firstNode === NULL) {
            $this->firstNode = &$node;
            $this->lastNode = &$node;
        } else {
            $currentFirstNode = $this->firstNode;
            $this->firstNode = &$node;
            $node->next = $currentFirstNode;
            $this->lastNode = &$currentFirstNode;
        }
        $this->totalNode++;
        return TRUE;
    }

    /**
     * 搜索节点
     * @param string|NULL $data
     * @return bool|null
     */
    public function search(string $data = NULL)
    {
        if ($this->totalNode) {
            $currentNode = $this->firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        return FALSE;
    }

    /**
     * 在指定值前面插入节点
     * @param string|NULL $data
     * @param string|NULL $query
     */
    public function insertBefore(string $data = NULL, string $query = NULL)
    {
        $node = new Node($data);

        if ($this->firstNode) {
            $previous = NULL;
            $currentNode = $this->firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $node->next = $currentNode;
                    if ($previous === NULL) {
                        $this->firstNode = &$node;
                    } else {
                        $previous->next = $node;
                    }
                    $this->totalNode++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    /**
     * 在指定值后面插入新节点
     * @param string|NULL $data
     * @param string|NULL $query
     */
    public function insertAfter(string $data = NULL, string $query = NULL)
    {
        $node = new Node($data);

        if ($this->firstNode) {
            $nextNode = NULL;
            $currentNode = $this->firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== NULL) {
                        $node->next = $nextNode;
                    }

                    $currentNode->next = $node;
                    $this->totalNode++;
                    if ($currentNode === $this->lastNode) {
                        $this->lastNode = &$node;
                    }
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }
}