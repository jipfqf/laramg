export function timeFix () {
  const time = new Date()
  const hour = time.getHours()
  return hour < 9 ? '早上好' : hour <= 11 ? '上午好' : hour <= 13 ? '中午好' : hour < 20 ? '下午好' : '晚上好'
}

export function welcome () {
  const arr = ['休息一会儿吧', '准备吃什么呢?', '要不要打一把 DOTA', '我猜你可能累了']
  const index = Math.floor(Math.random() * arr.length)
  return arr[index]
}
export function getRole(){
	const roleObj = {
		'id': 'admin',
		'name': '管理员',
		'describe': '拥有所有权限',
		'status': 1,
		'creatorId': 'system',
		'createTime': 1497160610259,
		'deleted': 0,
		'permissions': [{
			'roleId': 'admin',
			'permissionId': 'dashboard',
			'permissionName': '仪表盘',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"query","defaultCheck":false,"describe":"查询"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'query',
				'describe': '查询',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'exception',
			'permissionName': '异常页面权限',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"query","defaultCheck":false,"describe":"查询"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'query',
				'describe': '查询',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'result',
			'permissionName': '结果权限',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"query","defaultCheck":false,"describe":"查询"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'query',
				'describe': '查询',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'profile',
			'permissionName': '详细页权限',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"query","defaultCheck":false,"describe":"查询"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'query',
				'describe': '查询',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'table',
			'permissionName': '表格权限',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"import","defaultCheck":false,"describe":"导入"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'import',
				'describe': '导入',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'form',
			'permissionName': '表单权限',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"query","defaultCheck":false,"describe":"查询"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'query',
				'describe': '查询',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'order',
			'permissionName': '订单管理',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"query","defaultCheck":false,"describe":"查询"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'query',
				'describe': '查询',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'permission',
			'permissionName': '权限管理',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'role',
			'permissionName': '角色管理',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'table',
			'permissionName': '桌子管理',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"query","defaultCheck":false,"describe":"查询"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'query',
				'describe': '查询',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}, {
			'roleId': 'admin',
			'permissionId': 'user',
			'permissionName': '用户管理',
			'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"import","defaultCheck":false,"describe":"导入"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"},{"action":"export","defaultCheck":false,"describe":"导出"}]',
			'actionEntitySet': [{
				'action': 'add',
				'describe': '新增',
				'defaultCheck': false
			}, {
				'action': 'import',
				'describe': '导入',
				'defaultCheck': false
			}, {
				'action': 'get',
				'describe': '详情',
				'defaultCheck': false
			}, {
				'action': 'update',
				'describe': '修改',
				'defaultCheck': false
			}, {
				'action': 'delete',
				'describe': '删除',
				'defaultCheck': false
			}, {
				'action': 'export',
				'describe': '导出',
				'defaultCheck': false
			}],
			'actionList': null,
			'dataAccess': null
		}]
	}
	roleObj.permissions.push({
		'roleId': 'admin',
		'permissionId': 'support',
		'permissionName': '超级模块',
		'actions': '[{"action":"add","defaultCheck":false,"describe":"新增"},{"action":"import","defaultCheck":false,"describe":"导入"},{"action":"get","defaultCheck":false,"describe":"详情"},{"action":"update","defaultCheck":false,"describe":"修改"},{"action":"delete","defaultCheck":false,"describe":"删除"},{"action":"export","defaultCheck":false,"describe":"导出"}]',
		'actionEntitySet': [{
			'action': 'add',
			'describe': '新增',
			'defaultCheck': false
		}, {
			'action': 'import',
			'describe': '导入',
			'defaultCheck': false
		}, {
			'action': 'get',
			'describe': '详情',
			'defaultCheck': false
		}, {
			'action': 'update',
			'describe': '修改',
			'defaultCheck': false
		}, {
			'action': 'delete',
			'describe': '删除',
			'defaultCheck': false
		}, {
			'action': 'export',
			'describe': '导出',
			'defaultCheck': false
		}],
		'actionList': null,
		'dataAccess': null
	})
	return roleObj;
}

/**
 * 触发 window.resize
 */
export function triggerWindowResizeEvent () {
  const event = document.createEvent('HTMLEvents')
  event.initEvent('resize', true, true)
  event.eventType = 'message'
  window.dispatchEvent(event)
}

export function handleScrollHeader (callback) {
  let timer = 0

  let beforeScrollTop = window.pageYOffset
  callback = callback || function () {}
  window.addEventListener(
    'scroll',
    event => {
      clearTimeout(timer)
      timer = setTimeout(() => {
        let direction = 'up'
        const afterScrollTop = window.pageYOffset
        const delta = afterScrollTop - beforeScrollTop
        if (delta === 0) {
          return false
        }
        direction = delta > 0 ? 'down' : 'up'
        callback(direction)
        beforeScrollTop = afterScrollTop
      }, 50)
    },
    false
  )
}

export function isIE () {
  const bw = window.navigator.userAgent
  const compare = (s) => bw.indexOf(s) >= 0
  const ie11 = (() => 'ActiveXObject' in window)()
  return compare('MSIE') || ie11
}

/**
 * Remove loading animate
 * @param id parent element id or class
 * @param timeout
 */
export function removeLoadingAnimate (id = '', timeout = 1500) {
  if (id === '') {
    return
  }
  setTimeout(() => {
    document.body.removeChild(document.getElementById(id))
  }, timeout)
}
