'use strict';

// TODO: сделать рефакторинг сервиса

var ApiService = function ($resource, Upload) {
  /**
   *  Очистка пустых полей объекта
   *
   * @param fields
   */
  function removeEmptyFields(fields) {
    Object.keys(fields).forEach(function (key) {
      if (!fields[key]) {
        delete fields[key];
      }
    });
  }

  this.user = $resource('/api/user', null, {
    auth: {
      url: '/api/user/auth',
      method: 'post'
    },
    create: {
      url: '/api/user',
      method: 'post'
    },
    get: {
      url: '/api/user/',
      method: 'get'
    },
    getAlbums: {
      url: '/api/user/albums/',
      method: 'get'
    },
    getPhotos: {
      url: '/api/user/photos/:id',
      method: 'get'
    },
    isLogined: {
      url: '/api/user/islogined',
      method: 'get'
    },
    logout: {
      url: '/api/user/logout',
      method: 'get'
    }
  });

  this.user.edit = function (data) {
    // Очистка не заполненных полей
    removeEmptyFields(data);

    return Upload.upload({
      url: '/api/user/edit',
      data: data
    });
  };

  // FIXME: баг с отсутствием id
  this.photo = $resource('/api/photo', null, {
    edit: {
      url: '/api/photo/:id',
      method: 'post',
      params: {id: '@id'}
    },
    get: {
      url: '/api/photo/',
      method: 'get'
    },
    getAlbum: {
      url: '/api/photo/album',
      method: 'get'
    },
    getUser: {
      url: '/api/photo/user',
      method: 'get'
    },
    getLikesCount: {
      url: '/api/photo/likes-count',
      method: 'get'
    },
    getComments: {
      url: '/api/photo/comments',
      method: 'get'
    },
    getCommentsCount: {
      url: '/api/photo/comments-count',
      method: 'get'
    },
    delete: {
      url: '/api/photo/:id',
      method: 'delete'
    }
  });

  this.photo.create = function (data) {
    // Очистка не заполненных полей
    if (data) {
      removeEmptyFields(data);
    }

    return Upload.upload({
      url: '/api/photo',
      data: data
    });
  };

  this.album = $resource('/api/album', null, {
    get: {
      url: '/api/album/',
      method: 'get'
    },
    getPhotos: {
      url: '/api/album/photos',
      method: 'get'
    },
    getPhotosCount: {
      url: '/api/album/photos-count',
      method: 'get'
    },
    getCover: {
      url: '/api/album/cover',
      method: 'get'
    },
    delete: {
      url: '/api/album/',
      method: 'delete'
    }
  });

  this.album.create = function (data) {
    // Очистка не заполненных полей
    if (data) {
      removeEmptyFields(data);
    }

    return Upload.upload({
      url: '/api/album',
      data: data
    });
  };

  this.album.edit = function (data) {
    // Очистка не заполненных полей
    if (data) {
      removeEmptyFields(data);
    }

    return Upload.upload({
      url: '/api/album/' + data.id,
      data: data
    });
  };

  this.like = $resource('/api/like', null, {
    like: {
      url: '/api/like/:id',
      method: 'post',
      params: {id: '@id'}
    },
    unlike: {
      url: '/api/like/:id',
      method: 'delete',
      params: {id: '@id'}
    }
  });

  this.comment = $resource('/api/comment', null, {
    create: {
      url: '/api/comment/',
      method: 'post'
    },
    edit: {
      url: '/api/comment/:id',
      method: 'post',
      params: {id: '@id'}
    },
    get: {
      url: '/api/comment/:id',
      method: 'get'
    },
    delete: {
      url: '/api/comment/:id',
      method: 'delete',
      params: {id: '@id'}
    }
  });

  this.search = $resource('/api/search', null, {
    search: {
      url: '/api/search/',
      method: 'get'
    }
  });

  return this;
};

ApiService.$inject = ['$resource', 'Upload'];

exports.name = 'ApiService';

module.exports = angular.module('app.services.ApiService', [])
  .factory('ApiService', ApiService);